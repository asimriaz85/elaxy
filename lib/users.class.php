<?php
class Users_class{
	
	protected static $table_name			= 'users'; // Data base table name
	protected static $db_fields				= array(
											'userid',
											'email',
											'password',
											'user_type',
											'company_name',
											'fname',
											'lname',
											'phone',
											'fax',
											'bill_street1',
											'bill_street2',
											'bill_city',
											'bill_country',
											'bill_port',
											'ship_fname',
											'ship_lname',
											'ship_street1',
											'ship_street2',
											'ship_city',
											'ship_country',
											'ship_port',
											'ship_phone',
											'ship_fax',
											'pay_type',
											'transaction_in',
											'sale_method',
											'is_email',
											'terms',
											'date_register',
'user_status',
'reg_ip'

											); // All databae fileds name
	
public $userid;
public $email;
public $password;
public $user_type;
public $company_name;
public $fname;
public $lname;
public $phone;
public $fax;
public $bill_street1;
public $bill_street2;
public $bill_city;
public $bill_country;
public $bill_port;
public $ship_fname;
public $ship_lname;
public $ship_street1;
public $ship_street2;
public $ship_city;
public $ship_country;
public $ship_port;
public $ship_phone;
public $ship_fax;
public $pay_type;
public $transaction_in;
public $sale_method;
public $is_email;
public $terms;
public $date_register;
public $user_status;
public $reg_ip;


	
	private static function inst($record){ // Instance Function
	$object = new self;
	
	foreach($record as $attribute=>$value){
		if($object->has_attribute($attribute)){
			$object->$attribute = $value;
		}
	}
	return $object;
	}// End of instance function	
	
	
	private function has_attribute($attribute) { // Check if has attributes
		  // Will return true or false
	  return array_key_exists($attribute, $this->attributes());
	} // End of provate function has attributes	
	
	protected function attributes() { // return an array of attribute names and their values
	  $attributes = array();
	  foreach(self::$db_fields as $field) {
	    if(property_exists($this, $field)) {
	      $attributes[$field] = $this->$field;
	    }
	  }
	  return $attributes;
	}// End of protected Function attributes
	
	protected function sanitized_attributes() {
	  global $database;
	  $clean_attributes = array();

	  foreach($this->attributes() as $key => $value){
	    $clean_attributes[$key] = $database->escape_value($value);
	  }

	  return $clean_attributes;
	}
	
	public static function print_user_fullname($id=0){
		$userfullname = self::get_full_name($id);
		return ucwords($userfullname->fname) . ' ' . ucwords($userfullname->lname);	
	}
	
	public static function get_full_name($id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT fname, lname FROM " .self::$table_name. " WHERE userid={$id}");
		return !empty($result_array) ? array_shift($result_array) : false;		
	}
	public static function find_all(){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " .self::$table_name . " ORDER BY userid DESC");
		return !empty($result_array) ? ($result_array) : false;
	}// End of Funciton "find_all()"
	
	public static function search($find=''){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " .self::$table_name . " WHERE fname like '%{$find}%' LIMIT 10 ");
		return !empty($result_array) ? ($result_array) : false;
	}// End of Funciton "find_all()"	
	
	public static function find_by_id($id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " .self::$table_name. " WHERE userid={$id}");
		return !empty($result_array) ? array_shift($result_array) : false;
	}// End of Function find_by_id
	
	public static function find_by_email($email_address=''){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " .self::$table_name. " WHERE email='{$email_address}' ");
		return !empty($result_array) ? array_shift($result_array) : false;
	}// End of Function find_by_id	
	
	public static function find_by_sql($sql=""){
	global $database;
	$result_set = $database->query($sql);
	$object_array = array();
	while ($row = $database->fetch_array($result_set)){
		$object_array[] = self::inst($row);
	}
	return $object_array;
	}// End of function find_by_sql	
	
	public function save(){
		return isset($this->user_id) ? $this->update() : $this->create();
	} // Endu of function save()


	public function create() {
		global $database;
		
		$attributes = $this->sanitized_attributes();
	  	$sql = "INSERT INTO ".self::$table_name." (";
		$sql .= join(", ", array_keys($attributes));
	 	$sql .= ") VALUES ('";
		$sql .= join("', '", array_values($attributes));
		$sql .= "')";
		
		if($database->query($sql)){
			$this->userid = $database->insert_id();
			
			//Function of Parent class group to assign deefault user group to new user registeration
			return true;
		} else {
			return false;
		}
			
	} // End of public funciton create	
	
	
	public function update() {
		global $database;

		$attributes = $this->sanitized_attributes();
		$attribute_pairs = array();
		foreach($attributes as $key => $value) {
		  if(!empty($value)){
		  $attribute_pairs[] = "{$key}='{$value}'";
		  }
		}
		$sql = "UPDATE ".self::$table_name." SET ";
		$sql .= join(", ", $attribute_pairs);
		$sql .= " WHERE userid =". $database->escape_value($this->userid);

		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}// End of public function update	
	
	
	public static function unique_email($email){
			$sql = "SELECT * FROM ".self::$table_name." WHERE email = '{$email}' ";
			$rs = mysql_query($sql);
			$row = mysql_num_rows($rs);
			
			if($row > 0){
				return false;
			} else {
				return true;	
			}			
	}
	
	public static function verify_email($evcode=''){
		global $database;

		$sql  = "SELECT * FROM ".self::$table_name;
		$sql .= " WHERE evcode = '{$evcode}' ";
		$sql .= "LIMIT 1 ";
		
		
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;			
	}	
	
	public static function user_authentication($username,$password){ // User Authentication
		global $database;
		
		$password = md5($password);
		
		$username = $database->escape_value($username);
		$password = $database->escape_value($password);
		
		$sql  = "SELECT userid FROM ".self::$table_name;
		$sql .= " WHERE email = '{$username}' ";
		$sql .= "AND password = '{$password}' ";
		$sql .= "LIMIT 1 ";
		
		
		$result_array = self::find_by_sql($sql);
		return !empty($result_array) ? array_shift($result_array) : false;			
	} // End of User Authentication
	
	function get_users_of_domain($user_ids = array()){
		$user_ids = implode(',',$user_ids);
		$sql = "SELECT * FROM " .self::$table_name;
		$sql .= " WHERE userid IN(".$user_ids.")";
		return self::find_by_sql($sql);
	}
	
	public static function generate_unique_id(){ // Generate new IBO no for new user  registeration
	
		$unique_id = 'bmuser' . substr(number_format(date("ymdHisu") * rand(),0,'',''),0,10);
		$rs = mysql_query("SELECT userid FROM ".self::$table_name." WHERE unique_id = '{$unique_id}' ");
		$row = mysql_num_rows($rs);
		if($row > 0){
			$unique_id = $this->generate_unique_id();	
		} else {
			return $unique_id;	
		}
		
	} // End of generating new IBO number for new user registeration		
	
	function get_all_users(){ // Get all users
		
	} // End of list all users
	
	
	
	function delete_user(){ // Delte User
			
	} // End delete User
	
	function activate_user(){ // Activate user
		
	} // End activate user
	
	function de_activate(){ // Deactivate user
			
	} // End de_activate user	
	
	function get_status(){ // Get user status
	
	}
	
	function user_full_naem(){ // User full name
	
	} // User full name
	
	function is_active(){ // Check if user is active or not
		
	}// End check is_active

}
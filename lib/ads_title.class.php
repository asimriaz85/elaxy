<?php
class Ads_title_class {
	
	protected static $table_name			= 'ad_title_description'; // Data base table name
	protected static $db_fields				= array(
											'id',
											'postcode_loaction_id',
											'title',
											'description',
											'url'
											
											
											); // All databae fileds name
	

	public $id;	
	public $postcode_loaction_id;
	public $title;	
	public $description;
	public $url;	
	
	



	
	public static function find_all(){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " .self::$table_name);
		return !empty($result_array) ? $result_array : false;
	}// End of Funciton "find_all()"
	
	public static function find_by_id($id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " .self::$table_name. " WHERE id={$id}");
		return !empty($result_array) ? array_shift($result_array) : false;
	}// End of Function find_by_id
	
		public static function find_by_postid($loaction_id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " .self::$table_name. " WHERE postcode_loaction_id={$loaction_id}");
		return !empty($result_array) ? array_shift($result_array) : false;
	}// End of Function find_by_id
	

	public static function find_by_order($id=0){
		global $database;
		$result_array = self::find_by_sql("SELECT * FROM " .self::$table_name. " WHERE id={$id}");
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
	
	public function save(){
		return isset($this->id) ? $this->update() : $this->create();
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
			$this->id = $database->insert_id();
			
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
		$sql .= " WHERE id =". $database->escape_value($this->id);

		$database->query($sql);
		return ($database->affected_rows() == 1) ? true : false;
	}// End of public function update	
	
	
}
<?php
class MySQLDatabase {
	private $conn;
	private $magic_quotes_active;
	private $real_escape_string_exists;
	
	// Construct Fuction
	function __construct(){
		$this->open_conn();
		$this->magic_quotes_active = get_magic_quotes_gpc();
		$this->real_escape_string_exists = function_exists("mysql_real_escape_string");

	}// End of Construct
	
	// Funcion to open database connnection
	public function open_conn(){
		$this->conn = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
		if (!$this->conn){
			die("Dabase connection failed: " . mysql_error());
		}// End of if statement to check connection
		else{
			$db_select = mysql_select_db(DB_NAME,$this->conn);
			if(!$db_select){
				die("Database Selection failed: " . mysql_error());
			}// End of if statment to check db_select
		}// End of Else
	}// End of function "open_conn"

	// Function to close connection
	public function close_conn(){
		if(isset($this->conn)){
			mysql_close($this->conn);
			unset($this->conn);
		}// End of if statement for closing connection
	}// End of Function "close_conn"
	
	//Funcion query reslut
	public function query($sql){
		$result = mysql_query($sql, $this->conn);
		$this->confirm_query($result);
		return $result;
	}// End of Function "querty"
	
	// Funcion to prepare values to be inserted into mysql
	public function escape_value($value){
		if ($this->real_escape_string_exists){
			// comments
			if($this->magic_quotes_active){$value = stripslashes($value);}
			$value = mysql_real_escape_string($value);
		}
		else{
			if(!$this->magic_quotes_active){$value=addslashes($value);}
		}
		return $value;
	}// End of function "mysql_prep"
	
	// Fuction Fetch Arry to get result set
	public function fetch_array($result_set){
		return mysql_fetch_array($result_set);
	}// End of Function Fetch Array
	
	//Function to get the number of rows
	public function num_rows($result_set){
		return mysql_num_rows($result_set);
	}// end of function to get the rows
	
	// Function to check the last ID inserted into database
	public function insert_id(){
		return mysql_insert_id($this->conn);
	}// End of function "insert_id"
	
	// Funciotn to count affected rows
	public function affected_rows(){
		return mysql_affected_rows($this->conn);
	}// End of Function "affected_rows"
	
	// Function to confirm query results
	private function confirm_query($result){
		if (!$result){
			die("Database query failed: " .mysql_error());
		}// End of if statement to confirm result set
	}// End of Function "confirm_query"
	
}// End of Class MySQLDatabase
$database = new MySQLDatabase();
$db =& $database;
?>
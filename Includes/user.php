<?php
require_once(LIB_PATH.DS.'database.php');
//beginning of the class;
class User extends databaseObject {

protected static $tablename = "users";
protected static $db_fields = array('U_ID','First_name','Last_name','Gender','Reg_No','Password','Email','CL_ID','CO_ID','F_ID','R_ID');
public $U_ID;
public $First_name;
public $Last_name;
public $Gender;
public $Reg_No;
public $Password;
public $Email;
public $CL_ID;
public $CO_ID;
public $F_ID;
public $R_ID;

public static function authenticate($Reg_No ="",  $Password="") {
	global $database;
	$Reg_No = $database->escape_value($Reg_No);
	$Password = $database->escape_value($Password);
	//runing the sql
	$sql  = "SELECT * FROM users ";
	$sql.= "WHERE Reg_No = '{$Reg_No}' ";
	$sql.= "AND password = '{$Password}' ";
	$sql.= "LIMIT 1";
	$result_array = self::find_by_sql($sql);
	return !empty($result_array) ? array_shift($result_array) : false;
}

public function full_name() {
	if(isset($this->first_name) && isset($this->last_name)){
		return $this->first_name.' '.$this->last_name;
	}
}
//Common database function
public static function find_all(){
	global $database;
	return self::find_by_sql('SELECT * FROM users');
}
public static function find_by_id($id=0){
	global $database;
	$result_array = self::find_by_sql("SELECT * FROM users WHERE U_ID ={$id} LIMIT 1");
	return !empty($result_array) ? array_shift($result_array) : false;
}
public static function find_by_sql($sql = ''){
	global $database;
	$result_set = $database ->query($sql);
	$object_array = array();
	while( $row = $database->fetch_array($result_set)){
		$object_array[] = self::instantiate($row);
	}
	return $object_array;
}
private static function instantiate($record){
	//the long approach
	$object = new self;
			// $object->id 		= $record['id'];
		// $object->username 	= $record['username'];
		/// $object->first_name 	= $record['first_name'];
		// $object->last_name 	= $record['last_name'];
		// $object->password 	= $record['password'];
	//the dynamic approach
	foreach($record AS $attribute => $value){
		if($object->has_attribute($attribute)){
		$object->$attribute = $value;
	}
	}
	return $object;
}
private function has_attribute($attribute){
	//get_object_vars returns an assoc array with all attributes
	//(incl. private ones) as the keys and their current values
	$object_vars = get_object_vars($this);
	//value does not matter, does the key exists or not
	//will return true or false
	return array_key_exists($attribute, $object_vars);
}
protected function attributes() {
	//returns attribute names and their values
	// return get_object_vars($this);
	$attributes = array();
	foreach (self::$db_fields as $field) {
		if(property_exists($this, $field)){
				$attributes[$field] = $this->$field;
		}
	}
	return $attributes;
}
protected function sanitized_attributes () {
	global $database;
	//cleanse the database before being submitted
	$cleaned_attributes = array();
	foreach ($this->attributes() as $key => $value) {
		$cleaned_attributes[$key] = $database->escape_value($value);
	}
	return $cleaned_attributes;
}

 public function save(){
// decides which one to use either create or update depending on the existence of the id;
 	return  isset($this->id) ? $this->update() : $this->create();
 }
public function create(){
	global $database;
	// syntax-INSERT INTO table(key,key) VALUES ('values',values);
	// -single-quotes arounnd all values
	// -escape all values to prevent SQL injection
	$attributes = $this->sanitized_attributes();
	$sql = "INSERT INTO ".self::$tablename." (";
	$sql .= join(", ",array_keys($attributes));
	$sql .= ") VALUES ('";
	$sql .= join("', '",array_values($attributes));
	$sql .= "')";
	if($database->query($sql)){
		$this->id = $database->insert_id();
		return true;
	} else {
		return false;
	}
}
public function update(){
	global $database;
	// syntax - UPDATE table SET key='vakue', key='value' WHERE condition
	//-single quotes on all values
	//escape all value to prevent SQL injections
	$attributes = $this->sanitized_attributes();
	$attributes_pairs = array();
	foreach ($attributes as $key => $value) {
		$attributes_pairs[] = " {$key}='$value'";
	};
	$sql = "UPDATE ".self::$tablename." SET ";
	//old way
	// $sql .="username='".$database->escape_value($this->username)."',";
	// $sql .="password='".$database->escape_value($this->password)."',";
	// $sql .="first_name='".$database->escape_value($this->first_name)."',";
	// $sql .="last_name='".$database->escape_value($this->last_name)."' ";
	//better way
	$sql .=join(", ",$attributes_pairs);
	$sql .=" WHERE U_ID=".$database->escape_value($this->U_ID);
	$database->query($sql);
	return($database->affected_rows() ==1) ? true : false;
}
public function delete(){
//-syntax DELETE FROM table WHERE condition LIMIT 1;
//-escape all values to prevent SQL injection
//-LIMIT 1;
global $database;
$sql = "DELETE FROM".self::$tablename." ";
$sql .= "WHERE id=".$database->escape_value($this->id);
$sql .=" LIMIT 1";
$database->query($sql);
return($database->affected_rows() ==1)? true : false;
}
}
?>
<?php
//Pulling the database
require_once(LIB_PATH.DS.'database.php');
class photograph extends databaseObject {
protected static $tablename = "photographs";
protected static $db_fields = array('id','filename','type','size','caption');
public $id;
public $filename;
public $type;
public $size;
public $caption;
private $tmp_path;
protected $upload_dir = "images";
public $errors = array();
protected $upload_errors = array(
			UPLOAD_ERR_OK => "No errors.",
			UPLOAD_ERR_INI_SIZE  => "Larger than upload_max_filesize.",
			UPLOAD_ERR_FORM_SIZE => "Larger than form MAX_FILE_SIZE.",
			UPLOAD_ERR_PARTIAL => "Partial upload.",
			UPLOAD_ERR_NO_FILE => "No file.",
			UPLOAD_ERR_NO_TMP_DIR => "No temporary directory.",
			UPLOAD_ERR_CANT_WRITE => "Can't write to disk.",
			UPLOAD_ERR_EXTENSION => "File upload stopped by extension."
	);
// pass in the $_FILE['file_upload'] as an argument
public function attach_file($file){
	// perform error checking
	// error 1: if nothing was uploaded
	if(!$file || empty($file) || !is_array($file)){
		$this->errors [] = 'Nothing was uploaded';
		return false;
	}
	// error 2: if file upload got an issues; 
	elseif ($file['error'] != 0 ) {
		$this->errors[] = $this->upload_errors[$file['error']];
		return false;
	} else {
	// set upload object attributes
	$this->tmp_path = $file['tmp_name'];
	$this->filename = basename($file['name']);
	$this->type     = $file['type'];
	$this->size 	= $file['size'];
	return true;
}
}
public function save () {
	// New records dont have id's
	if(isset($this->id)){
	// basically the caption
		$this->update(); 
	} else {
		// check for errors
		// error 1: check for pre-exisiting errors;
		if(!empty($this->errors)){return false;}
		// error 2: Make sure the caption is not long
		if(strlen($this->caption) >= 255 ){
			$this->errors[] = "The caption can only be 255 characters long.";
			return false;}
		// error 3: File name or temporary location
		if(empty($this->filename) || empty($this->tmp_path)){
			$this->errors[] = "The file location was not available.";
			return false;}
		// Deternine the target path
		$target_path= SITE_ROOT.DS.'public'.DS.$this->upload_dir.DS.$this->filename;
		// error 4: check if file exists
		if(file_exists($target_path)){
		$this->errors [] = "The file <b>{$this->filename}</b> already exists";
		return false;
		}
		// moving the file
		if(move_uploaded_file($this->tmp_path,$target_path)){
		// Success
		//save a corresponding entry to the database;
		if($this->create()) {
		//remove the temporary file
		unset($target_path);
		return true; 
		} else {
		// saving the file details to the database failed
		$this->errors[] = "The file upload failed probably due to file restrictions";
		return false;
		}
		}
		
	}
} 
public function destroy(){
	//delete database entry
	if($this->delete()){
	//remove file
	$target_path = SITE_ROOT.DS.'public'.DS.$this->image_path();
	return unlink($target_path);
	} else {
		//database delete failed
		return false;
	}
}
public function image_path(){
	return $this->upload_dir.DS.$this->filename; 
}
public function size() {
	if($this->size < 1024){
		return "{$this->size} bytes";
	} elseif($this->size <1048576){
		$size_kb = round($this->size/1024);
		return "{$size_kb} KB";
	} else {
		$size_mb = round($this->size/1048576,1);
		return "{$size_mb} MB";
	}
}
// common database functions
public static function find_all(){
	global $database;
	return self::find_by_sql('SELECT * FROM '.self::$tablename);
}
public static function find_by_id($id=0){
	global $database;
	$result_array = self::find_by_sql("SELECT * FROM ".self::$tablename." WHERE id ={$database->escape_value($id)} LIMIT 1");
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
// replaced with the customized save
// public function save(){
// 	// decides which one to use either create or update depending on the existence of the id;
// 	return  isset($this->id) ? $this->update() : $this->create();
// }
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
	foreach ($attributes  as $key => $value) {
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
	$sql .=" WHERE id=".$database->escape_value($this->id);
	$database->query($sql);
	return($database->affected_rows() ==1) ? true : false;
}
public function delete(){
//-syntax DELETE FROM table WHERE condition LIMIT 1;
//-escape all values to prevent SQL injection
//-LIMIT 1;
global $database;
$sql = "DELETE FROM ".self::$tablename." ";
$sql .= "WHERE id= ".$database->escape_value($this->id);
$sql .=" LIMIT 1";
$database->query($sql);  
return($database->affected_rows() ==1)? true : false;
}
}
?>
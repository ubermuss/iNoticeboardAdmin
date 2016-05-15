<?php
require_once(LIB_PATH.DS."config.php");
// require_once(dirname(__FILE__) . DIRECTORY_SEPARATOR ."config.php");
class MySQLDatabase{
  private $connection;
  public $last_query;
  private $magic_quote_active;
  private $real_escape_string_exists;

  function __construct(){
    $this->open_connection();
    $this->magic_quote_active=get_magic_quotes_gpc();//check if magic_qoute are on
    $this->real_escape_string_exists=function_exists("mysql_real_escape_string");//check if the php version is newwer
  }
  public function open_connection(){
    $this->connection = mysql_connect(DB_SERVER,DB_USER,DB_PASS);
    if(!$this->connection){
      die("failed to connect to server");
    } else {
      $db_select=mysql_select_db(DB_NAME);
    //step 2.1 test database connection
    if(!$db_select){
        die("Failed to connect to database <br>". mysql_error());
    }
    }
  }
  //end of method for opening the connection
  public function close_connection() {
    if(isset($this->connection)) {
      mysql_close($this->connection);
      unset($this->connection);
    }
  }
  //end of method for closing the connection
  public   function escape_value($value){
    if($this->real_escape_string_exists){//if php version is newer
        if($this->magic_quote_active){//if php version is newer and magic quotes are on remove slashes
            $value=stripslashes($value);
        }
        $value=mysql_real_escape_string($value);//instead use mysql escape string thingy
    } else {
    if($this->magic_quote_active){//if magic qoutes qoutes(for older version)
        $value=addslashes($value);//add slashes manually
    }
    }
        return $value;
    }
  //end of escape_value method
  public function fetch_array($result_set){
      return mysql_fetch_array($result_set);
    }
  //end of fetch_array method 
  public function query($sql){
    $this->last_query = $sql;
    $result = mysql_query($sql,$this->connection);
    $this-> confirm_query($result);
    return $result;
  }
  //Returns the number of affected rows in the previous MySQL operation
  public function affected_rows(){
    return mysql_affected_rows($this->connection);
  }
  //return number of row in a result set
  public function num_rows($result_set){
    return mysql_num_rows($result_set);
  }
  //returns the id generated with AUTO_INCREMENT
  public function insert_id(){
    return mysql_insert_id();
  }
  // Fetches a result row as an associative array
  public function fetch_assoc($result_set){
    return mysql_fetch_assoc($result_set);
  }
  //validates the query
  private function confirm_query($result){
    if(!$result){
      $output = 'Mhh this query got some bad issues<br>'.mysql_error().'</br>';
      $output .= "Last Query : <u><b>".$this->last_query.'</b></u>';
      die($output);
    }
  }
}
$database = new MySQLDatabase();
?>

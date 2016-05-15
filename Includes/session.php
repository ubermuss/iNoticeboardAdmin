<?php
 class Session {
 	private $logged_in = false;
 	public $user_id;
 	function __construct(){
 		session_start();
 		$this->check_message();
 		$this -> check_login();
 		if($this->logged_in){
 			//do this
 		} else {
 			//do that
 		}
 	}
 	public function is_logged_in() {
 		return $this->logged_in;
 	}
 	public function log_in($userID){
 		//
 		$this->user_id = $_SESSION['user_id'] = $userID;
 		$this->logged_in = true;
 	}
 	public function log_out(){
 		unset($_SESSION['user_id']);
 		unset($this->user_id);
 		$this->logged_in =false;
 	}
 	public function message($msg=''){
 		if(!empty($msg)){
 		//setting the message i.e set_mesage
 		$_SESSION['message'] = $msg;
 		} else {
 		//get_mesage
 		return $this->message;
 		}
 	}
 	private function check_message(){
 		//is there a message already stored
 		if(isset($_SESSION['message'])){
 			//Add the message to attribute and erase stored attribute
 			$this->message = $_SESSION['message'];
 			unset($_SESSION['message']);
 		} else {
 			$this->message = '';
 		}
 	}
 	private function check_login (){
 		if(isset($_SESSION['user_id'])) {
 			$this->user_id = $_SESSION['user_id'];
 			$this->logged_in = true;
 		} else {
 			unset($this->user_id);
 			$this->logged_in = false;
 		}
 	}
 }
 $Session = new Session();
 $message = $Session->message();
?>
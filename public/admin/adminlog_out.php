<?php require_once('../../includes/initialize.php') ?>
<?php
	$admin = Admin :: find_by_id($Session->user_id);
	$name = $user->First_name;
	 $Session->log_out();
	 if(!$Session->is_logged_in()){
	 	log_action("log out","{$name} logged out");
	 	redirect_to('adminlog_in.php');
	 }
?>

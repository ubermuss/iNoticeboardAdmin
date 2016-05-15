<?php //adding the headers to allow cross orgin resource sharing
 include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php
// instatiate from user class
  $Reg_No = isset($_POST['RegNo']) ? trim($_POST['RegNo']) : null;
  $password = isset($_POST['Password']) ? trim($_POST['Password']) : null;
//authenticate the user
  $found_user = User :: authenticate($Reg_No, $password);
  if($found_user){
  	echo json_encode($found_user);
  } else {
  	$message = array("status"=>"0","Reg_No"=>$Reg_No,"password"=>$password);
  	echo json_encode($message);
  }

?>
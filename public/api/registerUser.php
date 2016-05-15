<?php //adding the headers to allow cross orgin resource sharing
 include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php
// instatiate from user class
$user = new User();
// isset($_POST['bar']) ? $_POST['bar'] : null
$user->First_name = isset($_POST['Fname']) ? $_POST['Fname'] : null;
$user->Last_name = isset($_POST['Lname']) ? $_POST['Lname'] : null;
$user->Gender=isset($_POST['gender']) ? $_POST['gender'] : null;
$user->Reg_No=isset($_POST['RegNo']) ? $_POST['RegNo'] : null;
$user->Password=isset($_POST['Password']) ? $_POST['Password'] : null;;
$user->Email=isset($_POST['Email']) ? $_POST['Email'] : null;;
$user->CL_ID=isset($_POST['Year']) ? $_POST['Year'] : null;;
$user->CO_ID=isset($_POST['Course']) ? $_POST['Course'] : null;;
$user->F_ID=isset($_POST['Faculty']) ? $_POST['Faculty'] : null;;
// insert new user to database;
if($user->create()){
  $message = array("status"=>"1");
} else {
  $message = array("status"=>"0");
}
echo json_encode($message);
?>
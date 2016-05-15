<?php require_once('initialize.php') ?><?php
// instatite from admin class
$admin = new Admin();
$admin->First_name = "Jane";
$admin->Last_name = "Doe";
$admin->Password="PamPam";
$admin->Email="johndoe@gmail.com";
// create the admin
if($admin->create()){
  $message = 'admin added';
} else {
  $message = 'failed';
}
echo $message;
 ?>
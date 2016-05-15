<?php require_once('../../includes/initialize.php') ?>
<?php if(!$Session->is_logged_in()){ redirect_to('log_in.php'); } ?>
<?php 
if (empty($_GET['id'])){
	$Session->message('No photo was selected');
	redirect_to('index.php');
 }
 $photo = Photograph :: find_by_id($_GET['id']);
 if($photo && $photo->destroy()){
 	$Session->message('Photo was deleted');  
 	redirect_to('index.php');
 } else {
 	$Session->message('Failed to delete photo');
 	redirect_to('index.php');
 }
 ?>
 <?php 
 if(isset($database)){$database->close_conncetion();}
  ?>

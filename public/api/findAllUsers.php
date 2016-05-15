<?php
//adding the headers to allow cross orgin resource sharing
include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post all adverts in order of descending upload time in json format
?>
<?php $users = User :: find_all();
// find adverts based on the sql parameter instantiated from the Advert class
?>
<?php echo json_encode($users); ?>
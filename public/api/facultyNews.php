<?php 
//adding the headers to allow cross orgin resource sharing
 include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post all faculty related news in order of descending upload time in json format ?>
<?php
$F_ID = $_GET['F_ID']; //get the  faculty id from the request
$sql="SELECT * FROM news WHERE F_ID=$F_ID ORDER BY N_ID DESC";
$news = News :: find_by_sql($sql);
//find class related news on the sql parameter instantiated from the News class
?>
<?php echo json_encode($news); ?>
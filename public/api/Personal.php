<?php 
//adding the headers to allow cross orgin resource sharing
 include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post all faculty related news in order of descending upload time in json format ?>
<?php
$U_ID = $_GET['U_ID']; //get the  faculty id from the request
$sql="SELECT * FROM personal WHERE U_ID=$U_ID ORDER BY P_ID DESC";
$news = personalMsg :: find_by_sql($sql);
//find class related news on the sql parameter instantiated from the News class
?>
<?php echo json_encode($news); ?>
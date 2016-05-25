<?php 
//adding the headers to allow cross orgin resource sharing
 include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post all news related to class, in order of descending upload time in json format ?>
<?php
$CL_ID = $_GET['CL_ID'];
$sql="SELECT * FROM news WHERE CL_ID=$CL_ID ORDER BY N_ID DESC";
$news = News :: find_by_sql($sql);
//find class related news based on the sql parameter instantiated from the News class
?>
<?php echo json_encode($news); ?>
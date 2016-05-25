<?php
//adding the headers to allow cross orgin resource sharing
include('cors.php');?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post broadcasted news in order of descending upload time in json format
//get the requested id from url ?>
<?php
$id=$_GET['P_ID'];
$sql="SELECT * FROM personal WHERE P_ID=$id";
$news = personalMsg :: find_by_sql($sql);
// find all broadcasted news from the news class
?>
<?php echo json_encode($news); ?>
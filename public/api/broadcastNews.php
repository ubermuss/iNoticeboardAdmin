<?php
//adding the headers to allow cross orgin resource sharing
 include('cors.php');?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post broadcasted news in order of descending upload time in json format ?>
<?php
$sql="SELECT * FROM news WHERE Broadcast=1 ORDER BY N_ID DESC";
$news = News :: find_by_sql($sql);
// find all broadcasted news from the news class
?>
<?php echo json_encode($news); ?>
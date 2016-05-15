<?php 
//adding the headers to allow cross orgin resource sharing
 include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post all lost and found items in order of descending upload time in json format ?>
<?php $sql="SELECT * FROM lostxfound ORDER BY LF_ID DESC" ?>
<?php $lostxfound = Lostxfound :: find_by_sql($sql);
//find items posted lostxfound based on the sql parameter instantiated from the lostxfound class?>
<?php echo json_encode($lostxfound); ?>
<?php 
//adding the headers to allow cross orgin resource sharing
 include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post all events in order of descending upload time in json format ?>
<?php $sql="SELECT * FROM event ORDER BY E_ID DESC"
//find all the event?>
<?php $events = Events :: find_by_sql($sql);?>
<?php echo json_encode($events); ?>
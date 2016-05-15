<?php
//adding the headers to allow cross orgin resource sharing
include('cors.php'); ?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post all adverts in order of descending upload time in json format
?>
<?php $sql="SELECT * FROM advert ORDER BY AD_ID DESC" ?>
<?php $adverts = Advert :: find_by_sql($sql);
// find adverts based on the sql parameter instantiated from the Advert class
?>
<?php echo json_encode($adverts); ?>
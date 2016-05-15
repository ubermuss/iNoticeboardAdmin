<?php 
//adding the headers to allow cross orgin resource sharing
 include('cors.php');
 ?>
<?php require_once('../../includes/initialize.php') ?>
<?php //post all course related news in order of descending upload time in json format ?>
<?php
$CO_ID = $_GET['CO_ID']; //get the  course id from the request
$sql="SELECT * FROM news WHERE CO_ID=$CO_ID ORDER BY N_ID DESC";
$news = News :: find_by_sql($sql);
// find news based on the sql parameter instantiated from the News class
?>

<?php echo json_encode($news); ?>
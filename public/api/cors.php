<?php
// include this on each api page so as to allow the remote client to access data
header("Content-Type: application/json; charset=utf-8");
header('Access-Control-Allow-Origin: *');  
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Content-Range, Content-Disposition, Content-Description');
?>
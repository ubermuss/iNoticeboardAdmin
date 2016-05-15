<?php
require_once('initialize.php');
function strip_zeros_from_date( $marked_string="" ) {
  // first remove the marked zeros
  $no_zeros = str_replace('*0', '', $marked_string);
  // then remove any remaining marks
  $cleaned_string = str_replace('*', '', $no_zeros);
  return $cleaned_string;
}

function redirect_to( $location = NULL ) {
  if ($location != NULL) {
    header("Location: {$location}");
    exit;
  }
}

function output_message($message="") {
  if (!empty($message)) {
    return "<p class=\"message\">{$message}</p>";
  } else {
    return "";
  }
}
function __autoload($class_name){
  $class_name = strtolower($class_name);
  $path = LIB_PATH.DS."{$class_name}.php";
  if(file_exists($path)){
    require_once($path);
  } else {
  die(" The file {$class_name} was not found");
  }
}

function include_template_layout($pageName = '') {
  include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.$pageName);
}

function log_action($action, $message = ""){
  $logfile = SITE_ROOT.DS.'logs'.DS.'log.txt';
  $new = file_exists($logfile) ? false : true;
  if($handle = fopen($logfile, 'a')){
    $timestamp = strftime("%d/%m/%Y at %H:%M", time());
    $content = "$timestamp | $action : $message\n";
    fwrite($handle, $content);
    if($new){
      chmod($logfile, 0755);
    } else {
      echo "could not open log file for writing";
    }
  }
}
function timestamp(){
  $hour = date("H")+1;
  $minute= date("i");
  return $hour.':'.$minute;
}
function datestamp(){
  $month= date("M");
  $date = date("d");
  $day= date("D");
  return $date." ".$day.", ".$month;
}
function getfullname($objectName){
  return $objectName->First_name.''.$objectName->Last_name;
}
?>

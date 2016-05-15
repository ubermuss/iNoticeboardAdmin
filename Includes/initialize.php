<?php
//path definition
//directory seperator is a php predifened constant
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);
//define path of the application
//   /mb16/inoticeboard/
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS."xampp".DS."htdocs".DS."inoticeboard");
defined('LIB_PATH') ? null :define('LIB_PATH', SITE_ROOT.DS.'includes');

//require(LIB_PATH.DS.'includes/header.php') ;
// loading the config files first
require_once(LIB_PATH.DS.'config.php');
//loading the helper functions
require_once(LIB_PATH.DS.'functions.php') ;
//loading the core objects 
require_once(LIB_PATH.DS.'session.php') ;
require_once(LIB_PATH.DS.'database.php') ;
require_once(LIB_PATH.DS.'databaseObject.php');
// load database related objects
require_once(LIB_PATH.DS.'admin.php') ;
require_once(LIB_PATH.DS.'user.php') ;
require_once(LIB_PATH.DS.'news.php') ;
require_once(LIB_PATH.DS.'events.php') ;
require_once(LIB_PATH.DS.'lostxfound.php') ;
require_once(LIB_PATH.DS.'advert.php') ;
require_once(LIB_PATH.DS.'photograph.php');
 ?>

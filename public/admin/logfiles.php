<style>
  .clear-btn{
  margin-left: 40%;

}
</style>
<link rel="stylesheet" href="../../Stylesheets/admin.css">
<?php require_once('../../includes/initialize.php') ?>
<?php $logfile = SITE_ROOT.DS.'logs'.DS.'log.txt'; ?>
<?php
include_template_layout('admin_header.php');
//include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'admin_header.php');
?>
<?php
  if(!$Session->is_logged_in()){  redirect_to('log_in.php');}
$user = User :: find_by_id($Session->user_id);
$name = $user->full_name();
if(isset($_GET['clear'])){
if($_GET['clear'] == 'true'){
  file_put_contents($logfile, '');
  log_action('logs cleared', "by {$name}");
  redirect_to('logfiles.php');
};}
?>
<body>
  <nav>
    <div class="nav-wrapper">
      <a href="index.php" class="brand-logo">Admin</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons left">person</i><?php echo $name ?></a></li>
        <li><a class='dropdown-button' href='#' data-activates='dropdown1'><i class="material-icons right">settings</i>Settings</a></li>
        <ul id="dropdown1" class="dropdown-content">
          <li><a href="#!">log Files</a></li>
          <li><a href="#!">two</a></li>
          <li><a href="#!">one</a></li>
          <li><a href="#!">two</a></li>
          <li class="divider"></li>
          <li><a href="log_out.php">Log out</a></li>
        </ul>
        
      </ul>
    </div>
  </nav>
  <div class="container">
    <div class="row">
      <div class="col l3 m3 s12 ">
        <!-- Page Content goes here -->
       <div class="card-panel teal">
          <span class="white-text">All the log files associated with fotoflick are found here, One should clik the clear all button upon wishing to clear all the logfiles created.         </span>
        </div>
      </div>
      <div class="col l6 m6 s12">
       <ul class="collection with-header">
        <li class="collection-header"><h4>Log files<a href="logfiles.php?clear=true"><i class="material-icons clear-btn">clear_all</i></a></h4></li>
      <?php if(file_exists($logfile) && is_readable($logfile) && $handle = fopen($logfile,'r')) {?>
      <?php while (!feof($handle)) {
        $entry = fgets($handle); {
          if(trim($entry) != "" ) { ?>
      <li class="collection-item"><?php echo $entry?></li>
      <?php }
      } ?>
      <?php }
    } else {
      echo "<li class='collection-item'>File was not found</li>"; 
      } ?>
      </ul>
      </div>
      <div class="col l3 m3 s12 hide-on-small-only">
      <div class="card-panel">Notifications</div>
       <ul class="collection with-header">
        <li class="collection-item">Alvin</li>
        <li class="collection-item">Alvin</li>
        <li class="collection-item">Alvin</li>
        <li class="collection-item">Alvin</li>
      </ul>
      </div>
      </div>
    </div>
    <script type="text/javascript">
    $(document).ready(function(){
      $.(".button-collapse").side-nav();
    })
    </script>
    <script type="text/javascript" src="../Javascript/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../Javascript/materialize.min.js"></script>
    <script type="text/javascript" src="../Javascript/materialize.js"></script>
  </body>
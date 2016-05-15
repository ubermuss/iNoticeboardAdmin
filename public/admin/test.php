<link rel="stylesheet" href="../../Stylesheets/admin.css">
<?php require_once('../../includes/initialize.php') ?>
<?php
include_template_layout('admin_header.php');
//include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'admin_header.php');
?>
<?php
  if(!$Session->is_logged_in()){  redirect_to('log_in.php');}
$user = User :: find_by_id($Session->user_id);
$name = $user->full_name();
?>
<?php 
// $user = new User();
// $user->username = "Nickie";
// $user->password = "1784";
// $user->first_name = "Nicky";
// $user->last_name = "Minaj";
// if($user->create()){
//   $message = 'User added';
// } else {
//   $message = 'failed';
// }
 ?>
}
}
<body>
  <nav>
    <div class="nav-wrapper       <a href="#!" class="brand-logo">Fotoflick</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="sass.html"><i class="material-icons left">person</i><?php echo $name ?></a></li>
        <li><a class='dropdown-button' href='#' data-activates='dropdown1'><i class="material-icons right">settings</i>Settings</a></li>
        <ul id="dropdown1" class="dropdown-content">
          <li><a class ="white" href="logfiles.php">log Files</a></li>
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
    <div class="col l12 s12 m12">
      <div class=" welcome card-panel">
        <span>
          Welcome, <?php echo $message;?> !
        </span>
      </div>
    </div>
  </div>
    <div class="row">
      <div class="col l3 hide-on-small-only">
        <!-- Page Content goes here -->
        xxx
      </div>
      <div class="col l6">
        xxxx
      </div>
      <div class="col l3 hide-on-small-only">
        <p><u>Notifs</u></p>
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
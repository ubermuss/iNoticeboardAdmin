<?php require_once('../../includes/initialize.php') ?>
<?php //if($Session->is_logged_in()){ redirect_to('index.php'); } ?>
<?php $title="Broadcast"; ?>

<?php
if(!$Session->is_logged_in()){  redirect_to('Adminlog_in.php');}
$admin = Admin :: find_by_id($Session->user_id);
$name=$admin->First_name;
$fullname = $admin->First_name.' '.$admin->Last_name;
$A_ID = $Session->user_id;
?>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'header.php');?>
<link rel="stylesheet" href="../css/navmenu.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/animate.css">

  <body>
    <div class="navmenu navmenu-default navmenu-side navmenu-fixed-left offcanvas-sm">
      <a class="navmenu-brand visible-md visible-lg" href="#">iNoticeboard Admin</a>
      <ul class="nav navmenu-nav">
        <li><a href="broadcast.php">News</a></li>
        <li><a href="addEvents.php">Events</a></li>
        <li><a href="addLostxfound.php">Lost and found</a></li>
        <li><a href="addAdvert.php">Adverts</a></li>
        <li class="active"><a href="users.php">Users</a></li>
        <li><a href="#" data-toggle="modal" data-target="#myModal">About</a></li>
        <li><a href="adminlog_out.php">Log out</a></li>
      </ul>
    </div>

    <div class="navbar navbar-default navbar-custom navbar-fixed-top hidden-md hidden-lg">
      <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu">
    <a href="#"><i class="material-icons menu-btn">menu</i></a>
      </button>
      <a class="navbar-brand" href="#">inoticeboard</a>
    </div>

    <div class="container">
      <div class="page-header">
        <h3>News</h3>
      </div>
     
  <!-- /.container -->
    <div class="row">
      <div class="col-md-6">
         <p >Hi! <?php echo $name ?>, Search user</p>
         <p class="user-text"><i class="material-icons">account_circle</i></p>
         <p class="user-text">Users</p>
        <form class="form-hor0izontal inner-form" method="POST" action="personal.php">
  <fieldset>
    <div class="form-group form-elements form-group-custom">
      <label for="inputEmail" class="col-md-2 control-label"><i class="material-icons">search</i></label>
      <div class="col-md-10">
        <input type="text" class="form-control form-custom" id="search" placeholder="Enter name or Registration number" name="Title" value="">
      </div>
    </div>
    <div class="row seperator">
      
    </div>
    </fieldset>
    </form>
      </div>
      <div class="col-md-6">
      <p>Users</p>
        <table class="table table-striped table-hover ">
  <thead>
  <tr>
    <th>Name</th>
    <th>Reg #</th>
    <th>Role</th>
    <th>Direct</th>
  </tr>
  </thead>
    <tbody id="tableBody">
 <!--  results go here -->
    </tbody>
  </div>
</table>
      </div>
    </div>
    </div>
    
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'modal.php');?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'scripts.php');?>
 <script src="../js/users.js"></script>
 <script></script>
  </body>
</html>
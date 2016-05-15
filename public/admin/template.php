<?php require_once('../../includes/initialize.php') ?>
<?php //if($Session->is_logged_in()){ redirect_to('index.php'); } ?>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'header.php');?>
<link rel="stylesheet" href="../css/navmenu.css">
    <link rel="stylesheet" href="../css/main.css">

  <body>
    <div class="navmenu navmenu-default navmenu-side navmenu-fixed-left offcanvas-sm">
      <a class="navmenu-brand visible-md visible-lg" href="#">iNoticeboard Admin</a>
      <ul class="nav navmenu-nav">
        <li class="active withripple"><a href="#">News</a></li>
        <li><a href="#">Events</a></li>
        <li><a href="#">Lost and found</a></li>
        <li><a href="#">Personal Msg</a></li>
        <li><a href="#">Users</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Log out</a></li>
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
      <p>Post news to inoticeboard app</p>
    </div><!-- /.container -->
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
  <script type="text/javascript" src="js/lib/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="js/lib/bootstrap.min.js"></script>
  <script type="text/javascript" src="js/lib/jasny-bootstrap.min.js"></script>
  <script type="text/javascript" src="js/lib/ripples.min.js"></script>
  <script type="text/javascript" src="js/lib/material.min.js"></script>
  <script type="text/javascript" src="js/lib/materialize.min.js"></script>
  <script type="text/javascript" src="js/lib/snackbar.min.js"></script>
  </body>
</html>
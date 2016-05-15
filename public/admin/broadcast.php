<?php require_once('../../includes/initialize.php') ?>
<?php //if($Session->is_logged_in()){ redirect_to('index.php'); } ?>
<?php $title="Broadcast"; ?>

<?php
if(!$Session->is_logged_in()){  redirect_to('Adminlog_in.php');}
$admin = Admin :: find_by_id($Session->user_id);
$name=$admin->First_name;
$fullname = $admin->First_name.' '.$admin->Last_name;
?>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'header.php');?>
<?php 
$message="";
if(isset($_POST['submit'])){
$news = new News();
$news->Title = $_POST['Title'];
$news->Content = $_POST['content'];
$news->Time = timestamp();
$news->Date = datestamp();
$news->Broadcast =1;
$news->Author=$fullname;
if($news->create()){
  $message = 'news added';
} else {
  $message = 'fail to add news';
}
}
$sql = "SELECT * FROM news WHERE Broadcast=1 ORDER BY N_ID DESC";
$counter = 1;
$news = News :: find_by_sql($sql); ?>
<link rel="stylesheet" href="../css/navmenu.css">
    <link rel="stylesheet" href="../css/main.css">

  <body>
    <div class="navmenu navmenu-default navmenu-side navmenu-fixed-left offcanvas-sm">
      <a class="navmenu-brand visible-md visible-lg" href="#">iNoticeboard Admin</a>
      <ul class="nav navmenu-nav">
        <li class="active withripple"><a href="broadcast.php">News</a></li>
        <li><a href="addEvents.php">Events</a></li>
        <li><a href="addLostxfound.php">Lost and found</a></li>
        <li class="withripple"><a href="addAdvert.php">Adverts</a></li>
        <li><a href="users.php">Users</a></li>
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
         <p>Hi! <?php echo $name ?>, Post news to inoticeboard app</p>
          <form class="form-hor0izontal inner-form" method="POST" action="broadcast.php">
  <fieldset>
    <div class="form-group form-elements form-group-custom">
      <label for="inputEmail" class="col-md-2 control-label">Title</label>
      <div class="col-md-10">
        <input type="text" class="form-control form-custom" id="Title" placeholder="Title" name="Title" value="">
      </div>
    </div>
        <div class="form-group">
      <label for="textArea" class="col-md-2 control-label">Content</label>

      <div class="col-md-10">
        <textarea class="form-control" rows="3" id="content" name="content" value=""></textarea>
        <span class="help-block">The main content lies here</span>
      </div>
    </div>
    <div class="row seperator">
      
    </div>
        <div class="form-group btn-wrapper">
      <div class="col-md-12">
        <button type="submit" class="btn btn-raised btn-success btn-post" name="submit" value="submit">post</button>
      </div>
      </div>
    </fieldset>
    </form>
      </div>
      <div class="col-md-6">
      <p>Added news</p>
        <table class="table table-striped table-hover ">
  <thead>
  <tr>
    <th>#</th>
    <th>Title</th>
    <th>Edit</th>
    <th>Delete</th>
     <th>Date</th>
  </tr>
  </thead>
  <tbody>
  <?php foreach ($news as $news) :?>
  <tr>
    <td><?php echo $counter++; ?></td>
    <td><?php echo $news->Title; ?></td>
    <td><a href="#"><i class="material-icons">mode_edit</i></a></td>
    <td><a href="#"><i class="material-icons">delete</i></a></td>
    <td><?php echo $news->Date; ?></td>
  </tr>
<?php endforeach; ?>
  </tbody>
</table>
      </div>
    </div>
    </div>
    
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'modal.php');?>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
 <?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'scripts.php');?>
  </body>
</html>
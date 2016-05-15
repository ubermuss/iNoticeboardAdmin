<?php require_once('../../includes/initialize.php') ?>
<?php //if($Session->is_logged_in()){ redirect_to('index.php'); } ?>
<?php $title="Broadcast"; ?>

<?php
if(!$Session->is_logged_in()){  redirect_to('Adminlog_in.php');}
$admin = Admin :: find_by_id($Session->user_id);
$name=$admin->First_name;
$fullname = $admin->First_name.' '.$admin->Last_name;
$A_ID = $Session->user_id;
$user_id=$_GET['user'];
$user = User :: find_by_id($user_id);
?>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'header.php');?>
<?php 
$message="";
if(isset($_POST['submit'])){
$Users = User :: find_by_id($user_id);
$Users->R_ID=$_POST['R_ID'];
if($Users->update()){
  $message = 'Assigned';
} else {
  $message = 'failed to assign';
}
}
$sql = "SELECT * FROM users WHERE R_ID <> 0";
$counter = 1;
$Users = User:: find_by_sql($sql); ?>
<link rel="stylesheet" href="../css/navmenu.css">
    <link rel="stylesheet" href="../css/main.css">

  <body>
    <div class="navmenu navmenu-default navmenu-side navmenu-fixed-left offcanvas-sm">
      <a class="navmenu-brand visible-md visible-lg" href="#">iNoticeboard Admin</a>
      <ul class="nav navmenu-nav">
        <li><a href="broadcast.php">News</a></li>
        <li><a href="addEvents.php">Events</a></li>
        <li><a href="addLostxfound.php">Lost and found</a></li>
        <li><a href="addAdvert.php">Adverts</a></li>
        <li><a href="Users.php">Users</a></li>
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
        <h3>Users&raquo;Assign roles</h3>
      </div>
     
  <!-- /.container -->
    <div class="row">
      <div class="col-md-6">
         <p >Hi! <?php echo $name ?>, assign role to student</p>
         <p class="user-text"><i class="material-icons">account_circle</i></p>
         <p class="user-text"><?php echo $user->First_name." ".$user->Last_name?></p>
        <form class="form-hor0izontal inner-form" method="POST" action="addRole.php?user=<?php echo $user_id ?>">
  <fieldset>
    <div class="form-group form-elements form-group-custom">
      <label for="inputEmail" class="col-md-2 control-label">Role</label>
      <div class="col-md-10">
       <select id="select" class="select form-control" name="R_ID">
                    <option value="2">Class representative</option>
                    <option value="3">Faculty representative</option>    
                  </select>
      </div>
    </div>
    <div class="row seperator">
      
    </div>
        <div class="form-group btn-wrapper">
      <div class="col-md-12">
        <button type="submit" class="btn btn-raised btn-success btn-post" name="submit" value="submit">assign</button>
      </div>
      </div>
    </fieldset>
    </form>
      </div>
      <div class="col-md-6">
      <p>Sent messages</p>
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
  <?php foreach ($Users as $Users) :?>
  <tr>
    <td><?php echo $counter++; ?></td>
    <td><?php echo $Users->First_name." ".$Users->Last_name ?></td>
    <td><a href="#"><i class="material-icons">mode_edit</i></a></td>
    <td><a href="#"><i class="material-icons">delete</i></a></td>
    <td><?php
    $R_ID=$Users->R_ID; 
    // swit
    switch ($R_ID) {
    case "2":
        echo "CR";
        break;
    case "3":
        echo "FR";
        break;
    default:
        echo "";
}
    ?></td>
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
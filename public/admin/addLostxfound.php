<?php require_once('../../includes/initialize.php') ?>
<?php //if($Session->is_logged_in()){ redirect_to('index.php'); } ?>
<?php $title="LostXfound"; ?>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'header.php');?>
<?php 
if(!$Session->is_logged_in()){  redirect_to('Adminlog_in.php');}
$admin = Admin :: find_by_id($Session->user_id);
$name=$admin->First_name; ?>
<?php
$counter = 1;
$max_fle_size = 1048576;
if(isset($_POST['submit'])){
$lostxfound = new LostXfound();
$lostxfound->Title = $_POST['Title'];
$lostxfound->Contacts = $_POST['Contacts'];
$lostxfound->Description=$_POST['Description'];
$lostxfound->attach_file($_FILES['photo']);
if($lostxfound->save()){
// success
$Session->message('Photo uploaded successfully');
} else {
//failed
$message = join('<br>',$lostxfound->errors);
}
echo output_message($message);
}
$sql="SELECT * FROM lostxfound ORDER BY LF_ID DESC";
$lostxfound = lostxfound :: find_by_sql($sql);
?>
<link rel="stylesheet" href="../css/bootstrap-material-datetimepicker.css">
<link rel="stylesheet" href="../css/navmenu.css">
<link rel="stylesheet" href="../css/main.css">
<link rel="stylesheet" href="../css/animate.css">
<link href="../css/jquery.dropdown.css" rel="stylesheet">
<body>
  <div class="navmenu navmenu-default navmenu-side navmenu-fixed-left offcanvas-sm">
    <a class="navmenu-brand visible-md visible-lg" href="#">iNoticeboard Admin</a>
    <ul class="nav navmenu-nav">
      <li class="withripple"><a href="broadcast.php">News</a></li>
      <li class="withripple"><a href="addEvents.php">Events</a></li>
      <li class="active withripple"><a href="addLostxfound.php">Lost and found</a></li>
      <li class="withripple"><a href="addAdvert.php">Adverts</a></li>
      <li class="withripple"><a href="users.php">Users</a></li>
      <li><a href="#" data-toggle="modal" data-target="#myModal">About</a></li>
      <li class="withripple"><a href="adminlog_out.php">Log out</a></li>
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
      <h3>Add item</h3>
    </div>
    
    <!-- /.container -->
    <div class="row">
      <div class="col-md-6">
        <p>Ola! <?php echo $name ?>,Post lost and found item to inoticeboard app</p>
        <form class="form-hor0izontal inner-form" method="POST" enctype="multipart/form-data" action="addLostxfound.php">
          <fieldset>
            <div class="form-group form-elements form-group-custom">
              <label for="inputEmail" class="col-md-2 control-label">Title</label>
              <div class="col-md-10">
                <input type="text" class="form-control form-custom" id="Title" placeholder="Title" name="Title" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="inputFile" class="col-md-2 control-label">Photo</label>
              <div class="col-md-10">
                <input type="text" readonly="" class="form-control" placeholder="upload item photo">
                <input type="file" id="inputFile" name="photo">
              </div>
            </div>
            <div class="form-group form-elements form-group-custom">
              <label for="inputEmail" class="col-md-2 control-label">Contacts</label>
              <div class="col-md-10">
                <input type="text" class="form-control form-custom" id="Contacts" placeholder="Contacts" name="Contacts" value="">
              </div>
            </div>
            <div class="form-group">
              <label for="textArea" class="col-md-2 control-label">Description</label>
              <div class="col-md-10">
                <textarea class="form-control" rows="3" id="Description" placeholder="Item description" name="Description" value=""></textarea>
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
          <p>Added items</p>
          <table class="table table-striped table-hover ">
            <thead>
              <tr>
                <th>#</th>
                <th>Title</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($lostxfound as $lostxfound) :?>
  <tr>
    <td><?php echo $counter++; ?></td>
    <td><?php echo $lostxfound->Title; ?></td>
    <td><img class="img-circle img-resize" src="../lostxfound/<?php echo $lostxfound->photo; ?>" alt=""></td>
    <td><a href="#"><i class="material-icons">mode_edit</i></a></td>
    <td><a href="#" class="status-btn"><i class="material-icons">lens</i></a></td>
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
     <script src="../js/lib/jquery.dropdown.js"></script>
    <script>
    $(document).ready(function()
    {
    $('#date').bootstrapMaterialDatePicker
    ({
    time: false,
    clearButton: true
    });
    });
    </script>
  </body>
</html>
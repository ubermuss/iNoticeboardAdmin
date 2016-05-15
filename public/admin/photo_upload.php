<?php require_once('../../includes/initialize.php') ?>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'admin_header.php');?>
<?php 
$max_fle_size = 1048576;
if(isset($_POST['submit'])){
  $photo = new photograph();
  $photo->caption = $_POST['caption'];
  $photo->attach_file($_FILES['file_upload']);
  if($photo->save()){
    // success
    $Session->message('Photo uploaded successfully');
    redirect_to('index.php');
  } else {
    //failed
    $message = join('<br>',$photo->errors);
  }
  echo output_message($message);
}
?>
<body>
<div class="big-picture">
<h5>Upload Photo</h5>
</div>
<div class="container box">
  <!-- //form goes here -->
  <div class="row">
  <div class="col l3 m3 hide-on-small-only">xx</div>
    <div class="col l6 m6 s12">
      <div class="log-in">
        <div class="container">
    <form class="col s12 form" action="photo_upload.php" enctype="multipart/form-data" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input type="hidden" name="MAX_FILE_SIZE" value="<?= $max_fle_size ?>">
           <div class="file-field input-field">
          <input class="file-path validate" placeholder="Upload photo" type="text"/>
          <input type="file" name="file_upload" />
    </div>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="caption" name="caption" type="text" class="validate" value = ''>
          <label for="Caption">Caption</label>
        </div>
      </div>
      <button type='submit' name="submit" class="btn-wrappper waves-effect waves-light btn red" value="Upload">Submit</button>
    </form>
  </div>
        </div>
      </div>
      <div class="col l3 m3 hide-on-small-only">xx</div>
    </div>
  </div>
</div>
</body>
<script type="text/javascript" src="../Javascript/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="../Javascript/materialize.min.js"></script>
</html>
  
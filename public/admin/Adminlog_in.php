<?php require_once('../../includes/initialize.php') ?>
<?php //if($Session->is_logged_in()){ redirect_to('index.php'); } ?>
<?php $title =""; ?>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'header.php');?>
<?php 
if(isset($_POST['submit'])){
  //form has been submitted
  $email = trim($_POST['Email']);
  $password = trim($_POST['password']);

  $found_user = Admin :: authenticate($email, $password);

  if($found_user){
    $Session->log_in($found_user->A_ID);
    log_action("login","{$found_user->First_name} logged in");
    redirect_to('broadcast.php');
  } else{
      $message = "<p id ='Loginmessage'>Incorrect Email or Password</p>";
  }
} else {
  //form has not been submitted
  $username ='';
  $message = '';
  $password = '';
}

?>
    <link rel="stylesheet" href="../css/main.css">
  <div class="container-fluid">
  <div class="row ">
    <div class="col-md-6 welcome-block">
      <p>iNoticeboard</p>
      <div class="row welcome-block-wrapper">
      <div class="col-md-6">
      <h3>People share, read and generally engage more with any type of content when it's surfaced through friends & people they know and trust.</h3>
      </div>
      <div class="col-md-6">
         <img id="logo" src="../images/mockup11.png" alt="" class="intro-logo">
      </div>
      </div>
    </div>
    <div class="col-md-6">
      <form class="form-horizontal form-block" method="POST" action="Adminlog_in.php">
  <fieldset>
    <div class="form-group form-elements form-group-custom">
      <label for="inputEmail" class="col-md-2 control-label">Email</label>
      <div class="col-md-10">
        <input type="email" class="form-control form-custom" id="inputEmail" name="Email" placeholder="Email">
      </div>
    </div>
    <div class="form-group form-elements form-group-custom">
      <label for="inputPassword" class="col-md-2 control-label">Password</label>
      <div class="col-md-10">
        <input type="password" class="form-control form-custom" id="inputPassword" name="password" placeholder="password">
        </div>
        <?php echo $message ?>
        </div>
        <div class="form-group ">
      <div class="col-md-12">
        <button type="submit" class="btn btn-raised btn-danger btn-submit " data-ripple-color="#F44336" name="submit" value="submit">Sign in</button>
      </div>
      </div>
    </fieldset>
    </form>
         <div class="row">
          <div class="col-xs-12 logo-intro-block">
            <img id="logo" src="../img/iconRed.png" alt="" class="intro-logo">
          </div>             
        </div>
    </div>
  </div>
</div>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'scripts.php');?>
<script>
  $('#Loginmessage').delay(1000).fadeOut('slow');
</script>
  </body>
</html>

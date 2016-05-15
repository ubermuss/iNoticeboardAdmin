<?php require_once('../../includes/initialize.php') ?>
<?php if($Session->is_logged_in()){ redirect_to('index.php'); } ?>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'admin_header.php');?>
<?php 
if(isset($_POST['submit'])){
  //form has been submitted
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);

  $found_user = User :: authenticate($username, $password);
  echo '<pre>';
  print_r($found_user);
  echo "</pre>";
//   if($found_user){
//     $Session->log_in($found_user);
//     log_action("login","{$found_user->username} logged in");
//     $message = $found_user;
//   } else{
//     $message = 'Username/Password is incorrect';
//   }
// } else {
//   //form has not been submitted
//   $username ='';
//   $message = '';
//   $password = '';
// }
}
  ?>
<body>
<div class="big-picture">
<h5>Fotoflick brings captured moments to life.</h5>
</div>
<div class="container box">
	<!-- //form goes here -->
	<div class="row">
	<div class="col l3 m3 hide-on-small-only">xx</div>
		<div class="col l6 m6 s12">
			<div class="log-in">
				<div class="container">
				<div class="row avatar-wrapper">
					<img class='avatar center-align'src="../images/profile5.png" alt="avatar">
				</div>
    <form class="col s12 form" action="log_in.php" method="post">
      <div class="row">
        <div class="input-field col s12">
          <input  id="username" name='username' type="text" class="validate" value ='<?php echo htmlentities($username)?>' >
          <label for="first_name">Username</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input id="password" name="password" type="password" class="validate" value = '<?php echo htmlentities($password)?>'>
          <label for="password">Password</label>
        </div>
      </div>
      <button type='submit' name="submit" class="btn-wrappper waves-effect waves-light btn red">Sign in</button>
    </form>
    <div class="message">
        <span class ='warning animated shake'><?php //print_r($message)?></span>
        </div>
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

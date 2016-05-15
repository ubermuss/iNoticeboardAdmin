<?php require_once("Includes/initialize.php"); ?>
<?php $title="Welcome"; ?>
 <!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="public/img/favicon.png">

    <title>inoticeboard <?php echo "| ".$title ?></title>

    <!-- Bootstrap core CSS -->
   
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/bootstrap-material-design.min.css">
    <link rel="stylesheet" href="public/css/jasny-bootstrap.min.css">
    <link rel="stylesheet" href="public/css/helper.css">
    <link rel="stylesheet" href="public/css/ripples.min.css">
    <link rel="stylesheet" href="./public/css/animate.css">
    <link rel="stylesheet" href="public/css/intro.css">
    </head>
    <body>
 	<nav class="navigation">
 	<div class="nav-wrapper">
 	<span>iNoticeboard</span>
 	<span id="log-in-btn"><a href="public/admin/log_in.php">Log in</a></span>
 	</div>
 	</nav> 
 	<!-- nav ends here-->
 	<div class="intro-inotice">
    <div class="container">
        <div class="row intro-notice-wrapper">
        
            <div class="col-xs-12">
                <h1>iNoticeboard<span class="text-muted">&raquo; Your info Companion</span></h1>
                <p class="lead">iNoticeboard is a unique App and a noticeboard alternative designed to help people get infromation shared in their community.</p>
                <p><a class="btn btn-raised btn-default download" href="#">DOWNLOAD</a></p>
            </div>
        </div>
    </div>    
</div>
<!-- intro-block ends here -->
	<div class="promo">
    <div class="container">
        <div class="row promo-wrapper">
       <div class="col-sm-3">
       <p class="image-wrapper">
                <img class="img" src="public/img/icon.png">
                </p>
            </div>
            <div class="col-sm-9 promo-right">
                <h3 class="tpad">ALWAYS ON HAND</h3><hr>
                <p>Download the App for your device now and try it for yourself. No more trips to the noticeboards, This app will completely change the way you get information related to your community.</p>
            </div>
        </div>
    </div>    
</div>
<!-- promo block ends here -->
<div class="features">
    <div class="container">
        <div class="row features-wrapper">
       <div class="col-md-4">
       	<p class="icon-badge"><i class="material-icons">view_headline</i></p>
       	<p class="feature-header">All the news in your hands</p>
       	<p class="feature-desc">Lorem ipsum Proident sint labore laborum Excepteur reprehenderit est Ut do nostrud cillum proident anim veniam ut magna in.</p>
       </div>
       <div class="col-md-4">
       	       	<p class="icon-badge"><i class="material-icons">local_play</i></p>
       	       	<p class="feature-header">Never miss an event!</p>
       	<p class="feature-desc">Lorem ipsum Proident sint labore laborum Excepteur reprehenderit est Ut do nostrud cillum proident anim veniam ut magna in.</p>
       </div>
       <div class="col-md-4">
       	       	<p class="icon-badge"><i class="material-icons">loyalty</i></p>
       	       	<p class="feature-header">All the ads at one place</p>
       	<p class="feature-desc">Lorem ipsum Proident sint labore laborum Excepteur reprehenderit est Ut do nostrud cillum proident anim veniam ut magna in.</p>
       </div>
        </div>
    </div>    
</div>
<!-- features block end here -->
	<div class="platform">
    <div class="container">
        <div class="row platform-wrapper">
       <div class="col-sm-3">
               <p class="platform-icon"><i class="material-icons">android</i></p>
            </div>
            <div class="col-sm-9 platform-right">
                <h3 class="tpad">AVAILABLE ON ANDROID</h3><hr>
                <p class="platform-content">iNoticeboard is currently available, on world's favourite platform, Google Android. Soon the app will be ported to iOS and Windows phone.</p>
            </div>
        </div>
    </div>    
</div>
<!-- platform block end here -->
<a href="#" data-toggle="modal" data-target="#myModal" class="bounceInUp animated btn btn-info btn-fab btn-fab-custom"><i class="material-icons">info_outline</i></a>
<?php include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'modal.php');?>
	</body>
 <script type="text/javascript" src="public/js/lib/jquery-2.1.4.min.js"></script>
  <script type="text/javascript" src="public/js/lib/bootstrap.min.js"></script>
  <script type="text/javascript" src="public/js/lib/jasny-bootstrap.min.js"></script>
  <script type="text/javascript" src="public/js/lib/ripples.min.js"></script>
  <script type="text/javascript" src="public/js/lib/material.min.js"></script>
  <script type="text/javascript" src="public/js/lib/materialize.min.js"></script>
  <script type="text/javascript" src="public/js/lib/snackbar.min.js"></script>
  <script type="text/javascript" src="public/js/lib/moment.js"></script>
  <script type="text/javascript" src="public/js/lib/bootstrap-material-datetimepicker.js"></script>
  <script type="text/javascript">
  $.material.init();    
</script>
</body>

    </body>
    </html>
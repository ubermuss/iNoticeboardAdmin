<link rel="stylesheet" href="../../Stylesheets/admin.css">
<?php require_once('../../includes/initialize.php') ?>
<?php
include_template_layout('admin_header.php');
//include(SITE_ROOT.DS.'public'.DS.'Layouts'.DS.'admin_header.php');
?>
<?php
 $username = "Pamela";
  $password = "Pampam";
  //runing the sql
  $sql  = "SELECT * FROM users ";
  $sql.= "WHERE username = '{$username}' ";
  $sql.= "AND password = '{$password}' ";
  $sql.= "LIMIT 1";
  $result_array = mysql_query($sql);
  $record = mysql_fetch_array($result_array);
  print_r($record);
  echo "<br>";
  echo $record['username'];
  echo "<br>";
  echo array_shift($record);
  ?>
<body>
  <form action="tes2.php" method="post">
    <p><input type="text" name="username" value=""></p>
    <p><input type="password" name="password" value=""></p>
  </form>
    <script type="text/javascript">
    $(document).ready(function(){
      $.(".button-collapse").side-nav();
    })
    </script>
    <script type="text/javascript" src="../Javascript/jquery-2.1.4.min.js"></script>
    <script type="text/javascript" src="../Javascript/materialize.min.js"></script>
    <script type="text/javascript" src="../Javascript/materialize.js"></script>
  </body>
<?php 
if(isset()){
	
}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
<p id="fader">Hi, and m out</p>
<form action="test3.php" method="POST">
	<input type="text" name="fadeActivator">
	<input type="submit">
</form>
	<script src="../js/lib/jquery-2.1.4.min.js"></script>	
	<script>
	$(document).ready(function(){
			$('#fader').fadeOut("slow");
	});		
	</script>
</body>
</html>
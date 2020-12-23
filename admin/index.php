<?php
session_start();
if (!isset($_SESSION["logedIn"])) {
	header('Location: ../login.php');
}
if($_SESSION["level"]!="admin"){	
	header('Location: ../login.php');
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>LearnEd | Admin</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
	
</head>
<body>
	<?php 
	include("inc/header.php");
	?>
	<div class="flex-box">
	<?php	
	include("inc/leftmargin.php"); 
	include("inc/bodyright.php");
	?>
	</div>
</body>
</html>
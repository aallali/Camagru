<?php session_start(); 
include('fragments/header.php') ;
include('fragments/footer.php');
if(!isset($_SESSION['id'])) header("Location: index.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Camagru</title>
		<link rel="stylesheet" type="text/css" href="style/index.css">
		<link rel="stylesheet" type="text/css" href="style/profile.css">
	</head>
	<body>
  <?php
  include('functions/memeber.php');
  $memebers=memebers('hello');
  // print_r($memebers[0]);
  $pdp = pdpeach('hello');
  for($i = 0; $i < numems('hello'); $i++)
  {
  echo "<div class='left'><div class='card'><img src='img/sysimg/" ;
echo $pdp[$i]['pdp'];
echo ("'alt='");
echo $memebers[$i]['username'] ;
echo "' style='width:100%'";
				
echo "<h1></h1>";
echo "<h1>[".$memebers[$i]['username']."]</h1>" ;
echo"<p class='title'><a style='color:black;font-size: 17px;text-align: left'>E-mail: </a>";
echo $memebers[$i]['mail'];
echo"</p><p style='color:green'>Account Verified</p></div></div>";
}
?>
	</body>
</html>
<?php 
session_start();
if(!isset($_GET['type']))
header("location: index.php");
include 'functions/like.php';

if ($_GET['type'] == "img/sysimg/dislike.png")
{
	 send_like($_GET['userid'], $_GET['imgid']);
	echo "img/sysimg/like.png";
		return ;
}else if ($_GET['type'] == "img/sysimg/like.png")
{
	remove_like($_GET['userid'], $_GET['imgid']);
	echo "img/sysimg/dislike.png";
return ;
}
else
header("Location: gallery.php");
?>
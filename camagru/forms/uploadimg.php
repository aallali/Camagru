<?php  
session_start();
include_once '../functions/uploadimg.php';

if(isset($_POST['upload']))
{
	if(isset($_FILES['image']))
{$name = "pdp".$_SESSION['id']."-".uniqid()."-".date('Y-m-d-H-m-s').".png";
$target = "../img/sysimg/".basename($name);



uploadimg($name,$_SESSION['id']);
if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
{
	echo "image uploaded succefuly";
}
else
	echo "something wrong on uploading the profile picture";
}}

header("Location: ../Profile.php");
return;
?>
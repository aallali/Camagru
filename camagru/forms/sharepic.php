<?php  
session_start();
include_once '../functions/sharepic.php';

if(isset($_POST['submit']))
{
$name = $_SESSION['id']."-".uniqid()."-".date('Y-m-d-H-m-s').".png";
$target = "../img/".basename($name);
// $db = mysqli_connect("localhost:8000", "root", "test","camagru");
// echo $target."<br>";

$image = $_FILES['sharepic']['name'];
uploadimg($name,$_SESSION['id']);
move_uploaded_file($_FILES['sharepic']['tmp_name'], $target);
}

header("Location: ../Profile.php");
?>    
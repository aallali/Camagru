<?php 
session_start();
include_once '../functions/deletepic.php';
if ($_GET['userid'] == $_SESSION['id'])
delete_pic($_GET['imgid']);
$_SESSION['error'] = "";
header("Location: ../camera.php");
 ?>
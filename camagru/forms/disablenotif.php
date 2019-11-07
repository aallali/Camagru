<?php 
session_start();
$notif = $_GET['notif'];
$userid= $_GET['id'];

include '../functions/disable_enable_notif.php';
disable_enable_notif($notif,$userid);
if ($notif == 0)
{
  $_SESSION['notif'] = 0;
}
else
{
  $_SESSION['notif'] = 1;
}

header("Location: ../profile.php");
?>
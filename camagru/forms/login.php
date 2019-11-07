<?php
session_start();
if(!isset($_SESSION['id']))
  header("location: index.php");

include '../functions/login.php';

$user = $_POST['username'];
$password = $_POST['password'];


$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$onenumber = preg_match('@[\d]@', $password);
$special   = preg_match('/[#$%^&*()+_!@=\-\[\]\';,.\/{}|":<>?~\\\\]/', $password);
if (empty($password)) {
    $_SESSION['error'] = 'Please enter password';
    header("Location: ../index.php");
    return;
} elseif (!$uppercase || !$lowercase || !$onenumber || !$special || strlen($password) < 8) {
    $_SESSION['error'] = "wrong password format";
    header("Location: ../index.php");
    return;
}
// retreive values

if(strlen($user) < 3 || preg_match('/^\s*$/', $user) == 1) {
  $_SESSION['error'] = "You need to enter a valid username";
  header("Location: ../index.php");
  return;
}
if (strlen($password) < 3) {
  $_SESSION['error'] = "wrong password !";
  header("Location: ../index.php");
  return;
}
if (($val = log_user($user, $password)) == -1) {
  $_SESSION['error'] = "user not found or password incorrect";
} else if (isset($val['err'])) {
   $_SESSION['error'] = "run setup file first";
} else {
  $_SESSION['id'] = $val['id'];
  $_SESSION['username'] = $val['username'];
  $_SESSION['mail'] =  $val['mail'];
  $_SESSION['notif'] =  $val['notif'];
  $_SESSION['email'] =  "";
}
 header("Location: ../index.php");
?>

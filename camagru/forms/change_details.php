<?php 
session_start();
include '../functions/change_details.php';
$error ="";
if (preg_match('/^\s*$/', $_POST['username']) == 1)
{
	$_SESSION['error'] = 'please enter a valid username';
    header("Location: ../profile.php");
    return;
}	
$password = $_POST['password'];
$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$onenumber = preg_match('@[\d]@', $password);
$special   = preg_match('/[#$%^&*()+_!@=\-\[\]\';,.\/{}|":<>?~\\\\]/', $password);
if (empty($password)) {
    $_SESSION['error'] = 'Please enter password';
    header("Location: ../profilephp");
    return;
} elseif (!$uppercase || !$lowercase || !$onenumber || !$special || strlen($password) < 8) {
    $_SESSION['error'] = "Your password must be have at least 8 characters long,<br> 1 number,<br> 1 special character,<br> 1 uppercase<br> and 1 lowercase character";
    header("Location: ../profile.php");
    return;
}
if ($_POST['username'] != "" && $_POST['email'] != "" && $_POST['password'] != "")
{
	if (strlen($_POST['password']) > 50 || strlen($_POST['password']) < 3)
		$error .= "password should be more than 3 chars <br>";
	if (strlen($_POST['username']) > 50 || strlen($_POST['username']) < 3)
		$error .= "username should be more than 3 chars <br>";
	if (preg_match("/<[^<]+>/",$_POST['username']) == 1)
		$error .= "wrong username format<br>";
	if(username_exists($_POST['username']) == 0)
		$error .= "username already taken<br>";
	if(email_exists($_POST['email']) == 0)
		$error .= "email already taken<br>";
}
$_SESSION['error'] = $error;
if (empty($error) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['password']))
{
	change_password($_POST['password'],$_SESSION['id']);
	change_username($_POST['username'],$_SESSION['id']);
	change_email($_POST['email'],$_SESSION['id']);
	$_SESSION['mail'] = $_POST['email'];
	$_SESSION['username'] = $_POST['username'];
}
header("Location: ../profile.php");
?>
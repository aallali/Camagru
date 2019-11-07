<?php 
session_start();
include '../functions/delete_p.php';


if ($_GET['delete'] == "cmnt")
delete_cmnt($_SESSION['id']);
if ($_GET['delete'] == "likes")
delete_like($_SESSION['id']);
if ($_GET['delete'] == "album")
{
	delete_cmnt($_SESSION['id']);
	delete_like($_SESSION['id']);
	delete_album($_SESSION['id']);
}
if ($_GET['delete'] == "account")
	{
		delete_like($_SESSION['id']);

delete_cmnt($_SESSION['id']);

	delete_album($_SESSION['id']);

		delete_account($_SESSION['id']);

$_SESSION['error'] = null;
$_SESSION['id'] = null;
$_SESSION['username'] = null;
$_SESSION['pdp'] = null;
$_SESSION['token'] = null;
$_SESSION['check'] = null;
$_SESSION['pdp'] = null;
$_SESSION['url'] = null;
$_SESSION['mail'] = null;
$_SESSION['email'] = null;
$_SESSION['notif'] = null;

	}


header("Location: ../profile.php");



 ?>
<?php
session_start();

$_SESSION['error'] = null;
$_SESSION['id'] = null;
$_SESSION['username'] = null;
$_SESSION['pdp'] = null;
$_SESSION['token'] = null;
$_SESSION['check'] = null;
$_SESSION['pdp'] = null;
$_SESSION['url'] = null;
header("Location: ../index.php");

?>

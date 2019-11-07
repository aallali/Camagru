<?php
session_start();
include_once '../functions/signup.php';
// retreive values
$mail              = $_POST['email'];
$username          = $_POST['username'];
$password          = $_POST['password'];
$_SESSION['error'] = null;


$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$onenumber = preg_match('@[\d]@', $password);
$special   = preg_match('/[#$%^&*()+_!@=\-\[\]\';,.\/{}|":<>?~\\\\]/', $password);
if (empty($password)) {
    $_SESSION['error'] = 'Please enter password';
    header("Location: ../signup.php");
    return;
} elseif (!$uppercase || !$lowercase || !$onenumber || !$special || strlen($password) < 8) {
    $_SESSION['error'] = "wrong password format";
    header("Location: ../signup.php");
    return;
}
if (!isset($mail) || !isset($username) || !isset($password) || preg_match('/^\s*$/', $username) == 1) {
    $_SESSION['error'] = "You need to fill all fields";
    header("Location: ../signup.php");
    return;
}

if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['error'] = "You need to enter a valid email";
    header("Location: ../signup.php");
    return;
}
if (strlen($username) > 50 || strlen($username) < 3) {
    $_SESSION['error'] = "Username should be beetween 3 and 50 characters";
    header("Location: ../signup.php");
    return;
}
if (strlen($password) < 3) {
    $_SESSION['error'] = "Password should be more than 3 characters";
    header("Location: ../signup.php");
    return;
}
$url             = $_SERVER['HTTP_HOST'] . str_replace("/forms/signup.php", "", $_SERVER['REQUEST_URI']);
$_SESSION['url'] = $url;
signup($mail, $username, $password, $url);
header("Location: ../signup.php");
?>
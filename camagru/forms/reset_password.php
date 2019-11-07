<?php
session_start();
$_SESSION['error'] = null;


include '../functions/reset.php';
if (isset($_POST['password']) && $_POST['password'] != NULL) {
    $password = $_POST['password'];
    $mail = $_GET['email'];
    $token = $_GET['token'];

$uppercase = preg_match('@[A-Z]@', $password);
$lowercase = preg_match('@[a-z]@', $password);
$onenumber = preg_match('@[\d]@', $password);
$special   = preg_match('/[#$%^&*()+_!@=\-\[\]\';,.\/{}|":<>?~\\\\]/', $password);
if (empty($password)) {
    $_SESSION['error'] = 'Please enter password';
    header("Location: ../reset.php");
    return;
} elseif (!$uppercase || !$lowercase || !$onenumber || !$special || strlen($password) < 8) {
    $_SESSION['error'] = "wrong password format";
    header("Location: ../reset.php");
    return;
}

    if (strlen($password) < 3) {
        $_SESSION['error'] = "Password should be more than 3 characters";
        header("Location: ../reset.php");
        return;
    }
    $num = change_password($token,$password,$mail);
    if ($num == -1) {
    	{
        $_SESSION['error'] = "email not found / or token is not valid anymore";}
    } else if($num == 1)
        $_SESSION['error'] = "password changed succefully, try log in";
        else if($num == 2)
        $_SESSION['error'] = "something went wrong retry please";
} else {
    $_SESSION['error'] = "blanc input";
}
header("Location: ../reset.php");
?>
<?php
session_start();
$_SESSION['error'] = null;
include '../functions/reset.php';
if (isset($_POST['email']) && $_POST['email'] != NULL) {
    $mail = $_POST['email'];
    if (reset_password($mail) == -1) {
        $_SESSION['error'] = "<a style='color:#3B5998'>We sent you a Reset link for your new password :)</a>";
		}
		else
			$_SESSION['error'] = "<a style='color:red'>OOPS! Something wrong, try again plz</a>";
} 
else {
    $_SESSION['error'] = "blanc input";
}
header("Location: ../forgot.php");
?>
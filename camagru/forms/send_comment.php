<?php  
session_start();
include'../functions/send_comment.php';
include'../functions/myalbum.php';
include'../functions/mail.php';

$page = $_POST['page'];
 if(isset($_POST['cmnt']) && !empty($_POST['cmnt']) && isset($_POST['userid']) && isset($_POST['imgid']) && strlen(trim($_POST['cmnt'])) > 0)
{
		send_comment($_POST['cmnt'], $_POST['userid'], $_POST["imgid"]);
	
	
		$theid = cmnter_name($_POST["imgid"],$_POST['userid']);
		$yesnotif = is_notif($theid[0]);
		if ($yesnotif == 1)
			send_notif_mail($theid[2], $theid[1], $_SESSION['username'], $_POST['cmnt']);
$_SESSION['error'] = null;
}
header("Location: ../gallery.php?page=".$page);
?>    
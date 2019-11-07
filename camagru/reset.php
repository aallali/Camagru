<?php
session_start();
if(isset($_SESSION['id']))
	header("location: index.php");
if(!isset($_GET['mail']))
header("location: index.php");
if(!isset($_GET['token']))
header("location: index.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>reset</title>
		<link rel="stylesheet" type="text/css" href="style/index.css">
		<link rel="stylesheet" type="text/css" href="style/resetbox.css">
	</head>
	<body>
		<?php include('fragments/header.php') ?>
		<?php include('fragments/footer.php') ?>
		<div class="box"><center>
		<?php	if (isset($_GET['mail']) && isset($_GET['token'])) {?>
			<form action="forms/reset_password.php?email=<?php echo($_GET['mail']); ?>&&token=<?php echo($_GET['token']);?>" method="post">
			
				<input type="text" name="email" placeholder="<?php echo($_GET['mail']); ?>" value ="<?php echo($_GET['mail']); ?>"  hidden><br>

				<input type="text" name="token" placeholder="<?php echo($_GET['token']); ?>" value="<?php echo($_GET['token']); ?>" hidden><br> 
				<p>New Password : </p>
				<input type="text" name="password" placeholder="write new password here" >
				<br><br>
				<button type="submit">Apply</button>
<?php } else			
echo ($_SESSION['error']);
$_SESSION['error'] = null;

				?>
				</center>
			</form>
		</div>
	</body>
</html>
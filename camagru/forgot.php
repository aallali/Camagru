<?php
session_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Camagru</title>
		<link rel="stylesheet" type="text/css" href="style/index.css">
		<link rel="stylesheet" type="text/css" href="style/loginstyle.css">
	</head>
	<body>
		<?php include('fragments/header.php') ?>
		<?php include('fragments/footer.php') ?>
				<div class="wrapper" >
  <div class="container">
   
    <h1><p class="seperator" >-Write your email to recover password-</p></h1>
    <form  action="forms/forgot.php" method="post">
    	<div class="group">
        <label for="username">Email</label>
        <input type="email" id="email" name="email" required>
      </div> <br>
      <input type="submit"  name="submit" value="RESET" id="submit"><br><br>
        <a href="index.php" class="forget-link">Login!</a>
    <br><span>
					<?php
					if(isset($_SESSION['error']))
							echo $_SESSION['error'];
				
						$_SESSION['error'] = null;

					?>
				</span>
    </form>
</div>

</div>
	</body>
</html>
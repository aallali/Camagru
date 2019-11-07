<!DOCTYPE html>
<html>
	<head>
		<title>Camagru</title>
		<link rel="stylesheet" type="text/css" href="style/index.css"> 
		<link rel="stylesheet" type="text/css" href="style/loginstyle.css"> 
	
	</head>
	<body>
			<?php session_start(); ?>
		<?php include('fragments/header.php') ?>
		<?php include('fragments/footer.php') ?>
<br>
	<div class="wrapper" >
  <div class="container">
  	<?php if(isset($_SESSION['id'])) { ?>
          You are connected as: <br> [ <?php print_r(htmlspecialchars($_SESSION['username']))?> ]
        <?php } else { ?>

    <form  action="forms/login.php" method="post">
      <div class="group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
      </div>

      <div class="group">
        <label for="password">Password:</label>
        <input  type="password" name="password">
      </div>

      <a href="forgot.php" class="forget-link">Forgot password?</a>
      <a href="signup.php" class="forget-link">Dont have an account? </a>
<a style="color:red"><?php 
				if(isset($_SESSION['error']))
					echo($_SESSION['error']);
				$_SESSION['error'] = null;
				?></a>
      <input type="submit"  name="submit" value="submit" id="submit">
    </form>		
  </div>
   <?php } ?>
</div>	
	</body>
</html>
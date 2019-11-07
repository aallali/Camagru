<?php
session_start();
if (isset($_SESSION['id']))
header("Location: index.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>sign-up camagru</title>
		<link rel="stylesheet" type="text/css" href="style/index.css">
		<link rel="stylesheet" type="text/css" href="style/loginstyle.css">
	</head>
	<body>
		<?php include('fragments/header.php') ?>
		<?php include('fragments/footer.php') ?>

		<div class="wrapper" >
  <div class="container">

    <form  action="forms/signup.php" method="post">
    	<div class="group">
        <label for="username">Email</label>
        <input type="email" id="email" name="email">
      </div>
      <div class="group">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
      </div>
      <div class="group">
        <label for="password">Password:</label>
        <input  id="password" type="password" name="password">
      </div>
      <a href="index.php" class="forget-link">Login!</a>
   
      <input type="submit"  name="submit" value="submit" id="submit"><br>
      <span>
            <?php
            if (isset($_SESSION['error']))
            echo "<a style='color:red'>".$_SESSION['error']."</a>";
            $_SESSION['error'] = null;
            if (isset($_SESSION['signup_success'])) {
              echo "<a style='color:green'>Signup success please check your mail box</a>";
              $_SESSION['signup_success'] = null;
            }
            ?>
          </span>
    </form>			
  </div>
</div>
</body>
</html>
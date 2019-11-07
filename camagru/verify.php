<?php
session_start();
if(!isset($_GET['token']))
header("location: index.php");
include_once './functions/verify.php';
?>
<!DOCTYPE html>
<HTML>
  <header>
    <link rel="stylesheet" type="text/css" href="style/index.css">
    <meta charset="UTF-8">
    <title>CAMAGRU - VERIFY</title>
  </header>
  <body>
    <?php include('fragments/header.php') ?>
    <?php include('fragments/footer.php') ?>
    <div class="verify">
    <div class="title">VERIFY</div><br>
    <?php if (verify($_GET["token"]) == 0) { ?>
      <strong>
        Your account as been verified !
      </strong>
    <?php } else { ?>
      <strong>
        SOMWTHING WENT WRONG<br>(Account not found or is already verified)</strong>
    <?php } ?>
    </div>
  </body>
</HTML>
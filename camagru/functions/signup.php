<?php

function signup($mail, $username, $password, $host) {
  include_once '../config/database.php';
  include_once '../functions/mail.php';

$mail = strtolower($mail);
$userid ='1';
  try {
          $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
          $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
          $query= $dbh->prepare("SELECT id FROM users WHERE username=:username OR mail=:mail");
          $query->execute(array(':username' => $username, ':mail' => $mail));
          // check if the user and email already exist in DataBase
          if ($val = $query->fetch()) {
            $_SESSION['error'] = "user already exist";
            $query->closeCursor();
            return(-1);
          }
          $query->closeCursor();

          // encrypt password
          $password = hash("whirlpool", $password);
          // insert user details to DataBase
          $query= $dbh->prepare("INSERT INTO users (username, mail, password, token) VALUES (:username, :mail, :password, :token)");
          $token = uniqid(rand(), true);
          $query->execute(array(':username' => $username, ':mail' => $mail, ':password' => $password, ':token' => $token));

          $query= $dbh->prepare("SELECT id FROM users WHERE username=:username OR mail=:mail");
          $query->execute(array(':username' => $username, ':mail' => $mail));
          $val = $query->fetch();
          $query->closeCursor();
          $query= $dbh->prepare("INSERT INTO profile (pdp,userid) VALUES (:image, :userid)");
          $query->execute(array(':image' => 'defavatar.png', ':userid' => $val['id']));
          // send verification mail to $mail
          send_verification_email($mail, $username, $token, $host);

          $_SESSION['signup_success'] = true;
          return (0);
      } catch (PDOException $e) {
          $_SESSION['error'] = "ERROR: ".$e->getMessage();
      }
}

?>

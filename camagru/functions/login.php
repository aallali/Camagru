<?php

function log_user($user, $password) {
  include_once '../config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("SELECT id, username, mail,notif FROM users WHERE username=:user AND password=:password AND verified='1'");
      $userMail = strtolower($user);
      $password = hash("whirlpool", $password);
      $query->execute(array(':user' => $user, ':password' => $password));

      $val = $query->fetch();
      if ($val == null) {
          $query->closeCursor();
          return (-1);
      }
      $query->closeCursor();

      return ($val);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}

?>

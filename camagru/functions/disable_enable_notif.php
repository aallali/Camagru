<?php

function disable_enable_notif($notif,$userid) {
  include_once '../config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("UPDATE users SET notif=:notif WHERE id=:userid");
      $query->execute(array(':notif'=>$notif, ':userid'=>$userid));
      $query->closeCursor();
          return (1);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
?>

<?php

function delete_album($id) {
include'../config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("DELETE FROM gallery WHERE userid=:id");
      $query->execute(array(':id' => $id));
       $query->closeCursor();
      return (1);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
function delete_like($id) {
include'../config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("DELETE FROM `like` WHERE userid=:id");
      $query->execute(array(':id' => $id));
       $query->closeCursor();
      return (1);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
function delete_cmnt($id) {
include'../config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("DELETE FROM comment WHERE userid=:id");
      $query->execute(array(':id' => $id));
       $query->closeCursor();
      return (1);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
function delete_account($id) {
include'../config/database.php';

 try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("DELETE FROM profile WHERE userid=:id");
      $query->execute(array(':id' => $id));
      $query= $dbh->prepare("DELETE FROM users WHERE id=:id");
      $query->execute(array(':id' => $id));
       $query->closeCursor();
      return (1);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
<?php

function gallery($num) {
include'config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
      $query= $dbh->prepare("SELECT img,id,userid FROM gallery ORDER BY `date` DESC LIMIT 5 OFFSET $num");
      
      $query->execute(array(':index' => $num));
      if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
        $query->closeCursor();
        return($val);
      }
       $query->closeCursor();
      return (3);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}

function gallery1() {
include'config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
      $query= $dbh->prepare("SELECT img,id,userid FROM gallery ORDER BY `date` DESC");
      
      $query->execute();
      if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
        $query->closeCursor();
        return($val);
      }
       $query->closeCursor();
      return (3);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}


function galleryall() {
include'config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
      $query= $dbh->prepare("SELECT img,id,userid FROM gallery ORDER BY `date` DESC");
      
      $query->execute();
      if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
        $query->closeCursor();
        return($val);
      }
       $query->closeCursor();
      return (3);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
function numberOfImg($num) {
include'config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
      $query= $dbh->prepare("SELECT count(img) FROM gallery");
      
      $query->execute(array());
      if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
        $query->closeCursor();
        return($val[0]['count(img)']);
      }
       $query->closeCursor();
      return (3);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}


?>
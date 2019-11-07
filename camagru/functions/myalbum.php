<?php

function myalbum($id) {
  include'config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("SELECT img,id FROM gallery WHERE userid=:userid");
      $query->execute(array(':userid' => $id));
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
function allalbum() {
include'config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("SELECT img FROM gallery");
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

function cmnter_name($imgid,$userid) {
include'../config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("SELECT userid FROM gallery WHERE id=:imgid");
      $query->execute(array(':imgid' => $imgid));
      if($val= $query->fetchAll(PDO::FETCH_ASSOC))
       $query->closeCursor();
     $id = $val['0']['userid'];
     $query= $dbh->prepare("SELECT username,mail FROM users WHERE id =:userid");
      $query->execute(array(':userid' => $id));
      $val= $query->fetchAll(PDO::FETCH_ASSOC);
       $query->closeCursor();
       $info=[];
       $info[]= $id;
       $info[]= $val['0']['username'];
       $info[]= $val['0']['mail'];
      return ($info);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}

function is_notif($id){
  include'../config/database.php';
    try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("SELECT id FROM users WHERE notif=:yes");
      $query->execute(array(':yes' => '1'));
      if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
        $query->closeCursor();
        return(1);
      }
       $query->closeCursor();
      return (0);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}

?>
<?php

function download_img($userid) {
include 'config/database.php';

  try {
      $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
      $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $query= $dbh->prepare("SELECT pdp FROM profile WHERE userid = :userid ORDER BY dateup DESC LIMIT 1");
      $query->execute(array(':userid' => $userid));
      if ($val = $query->fetch()) {
            $query->closeCursor();
            return($val);
          }
      return (1);
    } catch (PDOException $e) {
      $v['err'] = $e->getMessage();
      return ($v);
    }
}
?>
<?php 

function memebers($hello)
{
    include'config/database.php';
  

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT id,username,mail FROM users");
        $query->execute(array());

        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return ($val);
        }
return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}

function pdpeach($hello)
{
    include'config/database.php';
  

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT users.id, profile.pdp
                                FROM profile
                                INNER JOIN users ON users.id = profile.userid");
        $query->execute(array());

        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return ($val);
        }
return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}
function numems($hello)
{
    include'config/database.php';
  

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT COUNT(id) AS nbr FROM users WHERE verified ='1'");
        $query->execute(array());

        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return ($val[0]['nbr']);
        }
return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}
function get_comments($idimg)
{
    include'config/database.php';
  

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT comment,userid FROM comment WHERE galleryid=$idimg");
        $query->execute(array());

        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return ($val);
        }
        return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }

}
function num_comments($idimg)
{
    include'config/database.php';
  

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT COUNT(comment) AS NBR FROM comment WHERE galleryid=$idimg");
        $query->execute(array());

        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return ($val[0]['NBR']);
        }
        return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }

}
function num_likes($idimg,$type)
{
    include'config/database.php';
  

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT COUNT(type) AS NBR FROM `like` WHERE galleryid=$idimg AND type=$type");
        $query->execute(array(':galleryid'=>$idimg, ':type'=>$type));

        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return ($val[0]['NBR']);
        }
        return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }

}
function his_name($id)
{
    include'config/database.php';
  

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT username FROM users WHERE id=:id");
        $query->execute(array(':id' => $id));

        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return ($val[0]['username']);
        }
        return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }

}
?>
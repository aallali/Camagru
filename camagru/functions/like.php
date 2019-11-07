<?php 

function send_like($liker, $imgid)
{
    include'config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query= $dbh->prepare("INSERT INTO `like` (`id`, `userid`, `galleryid`, `type`) VALUES (NULL, '$liker', '$imgid', '1')");
        $query->execute();

       
        return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}

function remove_like($liker, $imgid)
{
    include'config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query= $dbh->prepare("DELETE FROM `like` WHERE `userid` = $liker AND `galleryid` = $imgid  AND `type` = 1");
        $query->execute();

       
        return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}


function he_liked($userid, $imgid)
{
    include'config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query= $dbh->prepare("SELECT * FROM `like` WHERE userid = $userid AND `galleryid` = $imgid AND `type` = 1");
        $query->execute();
        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return ($val[0]['type']);
        }
       else
        return 42;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}
function he_liked2($userid, $imgid)
{
    include'config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query= $dbh->prepare("SELECT * FROM `like` WHERE userid = $userid AND `galleryid` = $imgid AND `type` = 1");
        $query->execute();
        if ($val = $query->fetchAll(PDO::FETCH_ASSOC)) {
             $query->closeCursor();
            return (1);
        }
       else
        return 0;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}
function num_like($liker, $imgid, $type)
{
    include_once'config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $query= $dbh->prepare("INSERT INTO `like` (`id`, `userid`, `galleryid`, `type`) VALUES (NULL, '$liker', '$imgid', '$type')");
        $query->execute();

       
        return 1337;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}

 
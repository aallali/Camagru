<?php 

function delete_pic($imgid)
{
    include_once'../config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("DELETE FROM comment WHERE galleryid=:imgid");
        $query->execute(array(':imgid'=>$imgid));
        $query = $dbh->prepare("DELETE FROM `like` WHERE galleryid=:imgid2");
        $query->execute(array(':imgid2'=>$imgid));
        $query = $dbh->prepare("DELETE FROM gallery WHERE id=:imgid3");
        $query->execute(array(':imgid3'=>$imgid));
        $query->closeCursor();
            return (1);
        
    }
    catch (PDOException $e) {
        $_SESSION['error'] = " ";
    }
}

?>
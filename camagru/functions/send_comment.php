<?php 

function send_comment($comment, $userid, $imgid)
{
    include_once'../config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("INSERT INTO comment (userid, galleryid, comment) VALUES (:userid, :imgid, :comment)");
        $query->execute(array(':userid'=> $userid, ':imgid' => $imgid, ':comment' => htmlspecialchars($comment)));
        return 1;
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR:+ " . $e->getMessage();
    }
}

?>
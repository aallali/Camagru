#!/usr/bin/php
<?php
session_start();
include 'database.php';
$_SESSION['error'] = null;
$_SESSION['id'] = null;
$_SESSION['username'] = null;
$_SESSION['pdp'] = null;
$_SESSION['token'] = null;
$_SESSION['check'] = null;
$_SESSION['pdp'] = null;
$_SESSION['url'] = null;
$_SESSION['mail'] = null;
$_SESSION['email'] = null;
$_SESSION['notif'] = null;
 $_SESSION['dbexists'] = null;


header("Location: ../profile.php");
// DROP DATABASE
try {
        $dbh = new PDO($DB_DSN_LIGHT, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DROP DATABASE `".$DB_NAME."`";
        $dbh->exec($sql);
        echo "Database droped successfully\n";
    } catch (PDOException $e) {
        echo "ERROR DROPING DB: \n".$e->getMessage()."\n";
    }
?>

#!/usr/bin/php
<?php
include 'database.php';

// DROP DATABASE
try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "DELETE FROM `comment`";
        $dbh->exec($sql);

        $sql = "DELETE FROM `like`";
        $dbh->exec($sql);

        $sql = "DELETE FROM `gallery`";
        $dbh->exec($sql);

        array_map('unlink', glob("../img/*.png"));
        array_map('unlink', glob("../img/sysimg/pdp*.png"));
        echo "Montages cleaned successfully\n";
        // var_dump(glob("../img/*.png"));
    } catch (PDOException $e) {
        echo "ERROR CLEANING DB: \n".$e->getMessage()."\n";
    }
?>

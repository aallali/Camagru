<?php
function change_password($pass,$userid)
{
   include '../config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pass = hash("whirlpool", $pass);
        $query= $dbh->prepare("UPDATE users SET password=:pass WHERE id=:userid");
        $query->execute(array(':pass' => $pass, ':userid'=> $userid));
        return ("OK1");
    }
    catch (PDOException $e) {
         return("ERROR: " . $e->getMessage());
    }
}

function change_username($username,$userid)
{
   include '../config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query= $dbh->prepare("UPDATE users SET  username = :username WHERE id= :userid");
        $query->execute(array(':username' => htmlspecialchars($username), ':userid' => $userid));
        return ("OK2");
    }
    catch (PDOException $e) {
        return("ERROR: " . $e->getMessage());
    }
}
function change_email($mail,$userid)
{
   include '../config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   
        $query= $dbh->prepare("UPDATE users SET mail = :mail WHERE id=  :userid");
        $query->execute(array(':mail'=>htmlspecialchars($mail), ':userid' => $userid));
        return ("OK3");
    }
    catch (PDOException $e) {
        return("ERROR: " . $e->getMessage());
    }
}



function email_exists($email)
{
   include '../config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $dbh->prepare("SELECT id  FROM users WHERE mail=:email");
        $query->execute(array(':email' => $email));
        if ($val = $query->fetch()) {
            $query->closeCursor();
            return(0);
          }
          $query->closeCursor();
        return (1);
    }
    catch (PDOException $e) {
         return("ERROR: " . $e->getMessage());
    }
}
function username_exists($username)
{
   include '../config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $dbh->prepare("SELECT id  FROM users WHERE username=:user");
        $query->execute(array(':user' => $username));
        if ($val = $query->fetch()) {
            $query->closeCursor();
            return(0);
          }
          $query->closeCursor();
        return (1);
    }
    catch (PDOException $e) {
         return("ERROR: " . $e->getMessage());
    }
}



?>
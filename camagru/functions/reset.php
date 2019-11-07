<?php 

function reset_password($mail)
{
    include_once '../config/database.php';
    include_once'mail.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = $dbh->prepare("SELECT id,token,username FROM users WHERE mail=:mail");
        $query->execute(array(':mail' => $mail));

        if ($val = $query->fetch()) {
             $username = $val['username'];
             $token = $val['token'];
             $host= $url = $_SERVER['HTTP_HOST'] . str_replace("/forms/forgot.php", "", $_SERVER['REQUEST_URI']);
             send_reset_email($mail, $username, $token, $host);

             $query->closeCursor();
            return (-1);
        }

    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}
function change_password($token,$password,$mail)
{
   include_once '../config/database.php';

    try {
        $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query= $dbh->prepare("SELECT token FROM users WHERE mail=:mail AND token=:token");
        $query->execute(array(':mail' => $mail, ':token' => $token));
         if (!($val = $query->fetch())) {
            $_SESSION['error'] = "email not found or token is not valid anymore";
            $query->closeCursor();
            return(-1);
          }
          else 
       {
        $query= $dbh->prepare("UPDATE users SET password=:password, token=:token WHERE mail=:mail");
        $token = uniqid(rand(), true);
        $password = hash("whirlpool", $password);
        $query->execute(array(':password' => $password, ':token' => $token, ':mail' => $mail));
        $query->closeCursor();
        return (1);
    }

return (2);
    }
    catch (PDOException $e) {
        $_SESSION['error'] = "ERROR: " . $e->getMessage();
    }
}
?>
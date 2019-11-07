<?php

function send_verification_email($toAddr, $toUsername, $token, $ip) {
  $subject = "[CAMAGRU] - Email verification";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <aallali@student.1337.ma>' . "\r\n";

  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      To finish your subscribtion please click the link below </br>
      <a href="http://' . $ip . '/verify.php?token=' . $token . '">Verify my email</a>
      <br>thank you ! for any question or errors report please contact me at :  <a href="http://fb.com/allali.abdullah">@aallali</a>
      <br>(Admin : aallali)
    </body>
  </html>
  ';

  mail($toAddr, $subject, $message, $headers);
}
function send_notif_mail($toAddr, $toUsername, $from, $cmnt) {
  $subject = "[CAMAGRU] - Notification Mail";
  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <aallali@student.1337.ma>' . "\r\n";

  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      you have a new notification : </br>['
     .$from.'] just shared a comment on your pic <br>Time :'.date("Y/m/d - H:m:s").'
     <br>The comment = >['.htmlspecialchars($cmnt).']
    </body>
  </html>
  ';

  mail($toAddr, $subject, $message, $headers);
}
function send_reset_email($toAddr, $toUsername, $token, $ip) {
  $subject = "[CAMAGRU] - Email verification (Admin: aallali)";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
  $headers .= 'From: <aallali@student.1337.ma>' . "\r\n";

  $message = '
  <html>
    <head>
      <title>' . $subject . '</title>
    </head>
    <body>
      Hello ' . htmlspecialchars($toUsername) . ' </br>
      To reset your password please click the link below </br>
      <a href="http://' . $ip . '/reset.php?token=' . $token .'&&mail='.$toAddr.'">RESEY MY PASSWORD</a>
      <br>thank you ! for any question or errors report please contact me at :  <a href="http://fb.com/allali.abdullah">@aallali</a>
      <br>(Admin : aallali)
    </body>
  </html>
  ';

  mail($toAddr, $subject, $message, $headers);
}
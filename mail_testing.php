<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "src/PHPMailer.php";
require_once "src/SMTP.php";
require_once "src/Exception.php";

$mail = new PHPMailer(true);

$mail->SMTPDebug = 0;

$mail->isSMTP();

$mail->Host = "smtp.gmail.com";

$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
   'ssl' => array(
      'verify_peer' => false,
      'verify_peer_name' => false,
      'allow_self_signed' => true
   )
   );

   $mail->Username = "teams.webbank@gmail.com";
   $mail->Password = "S8c#%&7YPy";

   $mail->SMTPSecure = "tls";

   $mail->Port = 587;

   $mail->From = "teams.webbank@gmail.com";
   $mail->FromName = "WEB Bank";

   $mail->addAddress("adeleroops@gmail.com");

   $mail->isHTML(true);

   $mail->Subject = "this is test";

   $mail->Body = "Congrats";

   try{
      $mail->send();
      echo "Msg sent successfully";
   }catch(Exception $e){
      echo "Mailer error: ". $mail->ErrorInfo;
   }
?>
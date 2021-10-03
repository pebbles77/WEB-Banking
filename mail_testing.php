<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "src/PHPMailer.php";
require_once "src/SMTP.php";
require_once "src/Exception.php";

require 'assets/db.php';
require 'assets/function.php';



$email = " $_POST[email] ";
$name = "$_POST[name]";

$mail = new PHPMailer(true);

$mail->SMTPDebug = 0; //0 or 2

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

   $mail->addAddress($email);

   $mail->isHTML(true);

   $mail->Subject = "About Application Form Approval From WEB-Bank";

   $message = "Hi ". $name.", <br><br> Your application form has been approved by WEB-Bank. 
   <br><br> You can now log into your account with the email id and password that you provided in the application
   form. <br><br> With Regards, <br> WEB-Bank team";

   $mail->Body = $message;

   try{
      $mail->send();
      echo "<h5>Mail sent successfully</h5>";
   }catch(Exception $e){
      echo "Mailer error: ". $mail->ErrorInfo;
   }
?>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once "src/PHPMailer.php";
require_once "src/SMTP.php";
require_once "src/Exception.php";

$email = " $_POST[email] ";
$name = "$_POST[full_name]";

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

   $mail->Subject = "About Application Form Response";

   $message =  "
   <table>
      <tr><td>Name: </td><td>" . $_POST["full_name"] . "</td></tr>
      <tr><td>Mobile No.: </td><td>" . $_POST["mobile_number"] . "</td></tr>
      <tr><td>Email: </td><td>" . $_POST["email"] . "</td></tr>
      <tr><td>Message: </td><td>" . $_POST["message"] . "</td></tr>
   </table>
   ";

   $mail->Body = $message;

   try{
      $mail->send();
      echo "Msg sent successfully";
   }catch(Exception $e){
      echo "Mailer error: ". $mail->ErrorInfo;
   }
?>
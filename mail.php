<?php

// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'PHPMailer/vendor/autoload.php';

$mail = new PHPMailer();

$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPDebug = 1;
$mail->SMTPSecure = 'tls';
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->isHTML(true);
$mail->Username = "pritampal99@gmail.com";
$mail->Password = "99914090";
$mail->setFrom('pritampal99@gmail.com', 'Pritam Pal');
$mail->addAddress('pritampal99@gmail.com');
$mail->Subject = 'Check this mail bro';
$mail->Body = 'We are about to create history <b>HURRAY!</b>';
if(!$mail->send()) {
   echo 'Message could not be sent.';
   echo 'Mailer Error: ' . $mail->ErrorInfo;
   exit;
}
?>

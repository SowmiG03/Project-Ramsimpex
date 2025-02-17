<?php
require __DIR__ . "/vendor/autoload.php";
use PHPMailer\PHPMailer\PHPMailer;




$mail = new PHPMailer(true);

//$mail->SMTPDebug = SMTP::DEBUG_SERVER;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = "smtp.gmail.com";
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;
$mail->Username = "sowmianandh542003@gmail.com";
$mail->Password = "eurqigpeymfostzs";

$mail->isHtml(true);

return $mail;
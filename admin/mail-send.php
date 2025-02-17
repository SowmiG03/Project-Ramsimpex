<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

$mail = new PHPMailer(true);

try {
    $name = htmlspecialchars(strip_tags($_POST["name"]));
$email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
$subject = htmlspecialchars(strip_tags($_POST["subject"]));
$message = htmlspecialchars(strip_tags($_POST["message"]));

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Invalid email address.");
}
    // Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Debug output
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com"; // Replace with your SMTP host
    $mail->SMTPAuth = true;
    $mail->Username = "sowmianandh542003@gmail.com"; // Replace with your email
    $mail->Password = "eurqigpeymfostzs";        // Replace with your password or app password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Recipients
    $mail->setFrom($email, $name);
    $mail->addAddress($email, $name);
    // Content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = "<h1>{$subject}</h1><p>{$message}</p>";
    $mail->AltBody = $message;

    $mail->send();
    header("Location: index.php?status=success");
    exit;
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

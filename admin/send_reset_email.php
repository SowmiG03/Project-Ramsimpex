<?php
require 'db_connection.php';
require __DIR__ . '/vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

error_reporting(E_ALL);
ini_set('display_errors', 1);
var_dump($_POST);
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die('Invalid email format.');
    }

    $stmt = $conn->prepare("SELECT * FROM admin_login WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Account found!";
    } else {
        echo "No account found with that email.";
    }
}



function sendPasswordResetEmail($email, $token) {
    $resetLink = "http://localhost/ramsimpex/admin/reset-password.php?token=$token";

    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = SMTP::DEBUG_SERVER; // Debug output
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com"; // Replace with your SMTP host
        $mail->SMTPAuth = true;
        $mail->Username = "sowmianandh542003@gmail.com"; // Replace with your email
        $mail->Password = "eurqigpeymfostzs";        // Replace with your password or app password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;
    
        // Recipients
        $mail->setFrom($email);
        $mail->addAddress($email);
    
    

        $mail->isHTML(true);
        $mail->Subject = 'Password Reset Request';
        $mail->Body = "Click the link below to reset your password:<br>
                      <a href='$resetLink'>$resetLink</a><br><br>
                      This link will expire in 1 hour.";
        $mail->AltBody = "Click the link below to reset your password:\n$resetLink\n\nThis link will expire in 1 hour.";

        $mail->send();
    } catch (Exception $e) {
        echo "Error sending email: {$mail->ErrorInfo}";
    }
}
?>

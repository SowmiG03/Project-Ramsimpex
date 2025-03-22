<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $token = $_POST['token'];
    $newPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Update the password and clear the reset token
    $stmt = $conn->prepare("UPDATE admin_login SET password = ?, reset_token = NULL, reset_expires = NULL WHERE reset_token = ?");
    $stmt->bind_param("ss", $newPassword, $token);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo 'Your password has been reset successfully.';
    } else {
        echo 'Failed to reset password. Please try again.';
    }
}
?>
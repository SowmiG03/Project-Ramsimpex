<?php
// Include database connection
include "admin/database.php";

// Initialize variables for message
$response_message = "";
$message_type = ""; // success or error

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['send'])) {
    // Sanitize and trim inputs
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone_number']);
    $country = trim($_POST['country']);
    $user_message = trim($_POST['message']);

    // Validate inputs (optional but recommended)
    if (empty($name) || empty($email) || empty($phone) || empty($country) || empty($user_message)) {
        $response_message = "Fill out all details.";
        $message_type = "error";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response_message = "Invalid email format.";
        $message_type = "error";
    } else {
        // SQL query to insert data into the database
        $sql = "INSERT INTO contact_form (name, email, phone_number, country, message) VALUES (?, ?, ?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("sssss", $name, $email, $phone, $country, $user_message);
            
            if ($stmt->execute()) {
                $response_message = "Your message has been sent successfully!";
                $message_type = "success";
            } else {
                $response_message = "There was an error sending your message. Please try again.";
                $message_type = "error";
            }
            $stmt->close();
        } else {
            $response_message = "Database error: Unable to prepare statement.";
            $message_type = "error";
        }
    }

    // Redirect back to the form page with encoded message
    header("Location: contact.php?message=" . urlencode($response_message) . "&message_type=" . urlencode($message_type));
    exit();
}
?>

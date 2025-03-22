<?php
session_start();
include "admin/database.php";

// Initialize response array
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    // Check user credentials
    $query = "SELECT id, name, email, password FROM users_broucher WHERE email = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $name, $email, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            // Set session variables
            $_SESSION["id"] = $id;
            $_SESSION["email"] = $email;
            $_SESSION["name"] = $name;

            // Return success response
            $response["status"] = "success";
            $response["message"] = "Login successful! You can now download the brochure.";
        } else {
            // Incorrect password
            $response["status"] = "error";
            $response["message"] = "Invalid password!";
        }
    } else {
        // User not found
        $response["status"] = "error";
        $response["message"] = "User not found!";
    }

    $stmt->close();
    $mysqli->close();
} else {
    // Invalid request method
    $response["status"] = "error";
    $response["message"] = "Invalid request method!";
}

// Return JSON response
echo json_encode($response);
?>

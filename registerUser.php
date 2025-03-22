<?php
include "admin/database.php";

// Initialize response array
$response = array();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);
    $password = password_hash($_POST["password"], PASSWORD_BCRYPT); // Hash password

    // Check if email already exists
    $check_email = "SELECT id FROM users_broucher WHERE email = ?";
    $stmt = $mysqli->prepare($check_email);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // Email already exists, return error message
        $response["status"] = "error";
        $response["message"] = "Email already registered!";
    } else {
        // Insert user into database
        $query = "INSERT INTO users_broucher (name, email, password) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($query);
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            // Registration successful
            $response["status"] = "success";
            $response["message"] = "Registration successful!";
        } else {
            // Error during registration
            $response["status"] = "error";
            $response["message"] = "Error: " . $stmt->error;
        }
    }

    $stmt->close();
} else {
    // If not POST request, return error
    $response["status"] = "error";
    $response["message"] = "Invalid request method";
}

$mysqli->close();

// Return JSON response
echo json_encode($response);
?>

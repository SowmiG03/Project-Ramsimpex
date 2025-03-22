<?php
session_start();


// Check if the user is logged in (assuming a session variable 'user_id' exists when logged in)
if (!isset($_SESSION['id'])) {
    // Return a response indicating the user is not logged in
    echo json_encode(['status' => 'error', 'message' => 'not_logged_in']);
    exit();
}

// Define the secure file path
$filePath = realpath(__DIR__ . '/brochuers/broucher.pdf');

// Ensure the file exists and is inside the intended directory (to prevent directory traversal)
$allowedDir = realpath(__DIR__ . '/brochuers'); // Set your allowed directory
if ($filePath && file_exists($filePath) && strpos($filePath, $allowedDir) === 0) {
    echo json_encode(['status' => 'success', 'message' => 'file_ready']);
    exit(); // Stop further execution after sending JSON response

} else {
    // Return a 404 status code for file not found
    http_response_code(404);
    echo json_encode(['status' => 'error', 'message' => 'file_not_found']);
}
?>

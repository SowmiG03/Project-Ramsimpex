<?php
// Enable output buffering and set JSON header
ob_start();
header('Content-Type: application/json');
error_reporting(0);

// Include the database connection
include "admin/database.php";

if (!$mysqli) {
    echo json_encode(["error" => "Database connection failed: " . mysqli_connect_error()]);
    exit;
}

// Check if the 'query' parameter exists
if (!isset($_GET['query'])) {
    echo json_encode(['error' => 'Required parameters missing']);
    exit;
}

$query = $_GET['query'];
$query = "%" . $query . "%"; // Use wildcards for partial matching

// Prepare and execute the SQL query
$sql = "SELECT * FROM products 
WHERE (product_name LIKE ? OR keywords LIKE ?) 
AND status='enabled'
";
$stmt = $mysqli->prepare($sql);

if ($stmt === false) {
    echo json_encode(["error" => "Error preparing statement: " . $mysqli->error]);
    exit;
}

$stmt->bind_param("ss", $query, $query);
$stmt->execute();
$result = $stmt->get_result();

// Fetch results as an associative array
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}

// Output results as JSON
echo json_encode($products);

// Close the database connection
$stmt->close();
$mysqli->close();

<?php
include "session_check.php";
include "database.php";

// Get the product ID and current status from the query string
$id = $_GET['product_id'];

// Fetch the current status of the product
$query = "SELECT status FROM products WHERE product_id = $id";
$result = mysqli_query($mysqli, $query);
$product = mysqli_fetch_assoc($result);

if ($product) {
    // Toggle the status
    $new_status = ($product['status'] === 'enabled') ? 'disabled' : 'enabled';
    
    // Update the product's status
    $update_query = "UPDATE products SET status = '$new_status' WHERE product_id = $id";
    
    if (mysqli_query($mysqli, $update_query)) {
        echo "<script>alert('Product status updated to $new_status.'); window.location.href = 'view_product.php';</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($mysqli) . "');</script>";
    }
} else {
    echo "<script>alert('Product not found.'); window.location.href = 'view_product.php';</script>";
}

$mysqli->close();
?>

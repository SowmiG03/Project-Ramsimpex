<?php

include "session_check.php";
// Include database connection
include "database.php";

// Fetch product details from the database based on the ID
if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $sql = "SELECT * FROM products WHERE product_id = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Product not found!";
        exit;
    }
} else {
    echo "No product ID specified.";
    exit;
}

// Handle form submission to update product
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get updated product data
    $product_name = $_POST['product_name'];
    $keywords = $_POST['keywords'];

    // Handle file upload (optional, only if the user uploads a new photo)
    $upload_dir = "uploads/products/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
    }

    $file_name = basename($_FILES["product_photo"]["name"]);
    if ($file_name) {
        // If a new image is uploaded, move it to the uploads folder
        $file_path = $upload_dir . $file_name;
        $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

        // Validate file type
        $allowed_types = array('jpg', 'jpeg', 'png');
        if (!in_array($file_type, $allowed_types)) {
            echo "<script>alert('Only JPG, JPEG, and PNG files are allowed.');</script>";
            exit;
        }

        if (move_uploaded_file($_FILES["product_photo"]["tmp_name"], $file_path)) {
            $stmt = $mysqli->prepare("UPDATE products SET product_name = ?, product_photo = ?, keywords = ? WHERE product_id = ?");
            $stmt->bind_param("sssi", $product_name, $file_path, $keywords, $product_id);
        } else {
            echo "<script>alert('Failed to upload image.');</script>";
            exit;
        }
    } else {
        // If no new image is uploaded, update without changing the photo
        $stmt = $mysqli->prepare("UPDATE products SET product_name = ?, keywords = ? WHERE product_id = ?");
        $stmt->bind_param("ssi", $product_name, $keywords, $product_id);
    }

    // Execute update query
    if ($stmt->execute()) {
        echo "<script>alert('Product updated successfully.'); window.location.href = 'view_product.php';</script>";
    } else {
        echo "<script>alert('Error: " . $stmt->error . "');</script>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #4b0082;
            font-family: Cascadia Code !important;
        
        }
        .container {
            background-color:rgb(233, 235, 238);        
                padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin: 50px auto;
            max-width: 500px;

        }
        h2 {
            color: #6a0dad;
            text-align: center;
        }
        label {
            color: #6b0ea5; /* Purple */
              }

        .btn-primary {
            background-color: #6b0ea5;
            color: white;
            border: none;
            border-radius: 30px;
            width: 50%;
            padding: 10px;
        }
        .btn-primary:hover {
            background-color: #4b0082;
            border-color: #4b0082;
        }


        .form-control {
            border-radius: 30px;
        }

        .form-control:focus {
            border: 1px solid #6b0ea5;
            box-shadow: 0 0 5px #6b0ea5;
        }

        .submit-container {
            display: flex;
            justify-content: center !important;
        }

    </style>
</head>
<body>
    <div class="container mt-5">
    <div class="form-container"> 
        <h2 class="text-center">EDIT PRODUCT</h2>
        <form action="edit_product.php?product_id=<?php echo $row['product_id']; ?>" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="product_name" class="form-label">Product Name:</label>
                <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo $row['product_name']; ?>" required>
            </div>

            <div class="mb-3">
                <label for="product_photo" class="form-label">Product Photo:</label>
                <input type="file" class="form-control" id="product_photo" name="product_photo" accept=".png, .jpeg, .jpg">
                <img src="<?php echo $row['product_photo']; ?>" alt="Current Product Photo" width="100" class="mt-2 border rounded">
            </div>

            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords:</label>
                <textarea class="form-control" id="keywords" name="keywords" rows="4"><?php echo $row['keywords']; ?></textarea>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </form>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

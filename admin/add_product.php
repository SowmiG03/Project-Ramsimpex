
<?php
include "session_check.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database mysqliection
  include "database.php";

    // Get form data
    $product_name = $_POST['product_name'];
    $keywords = $_POST['keywords'];

    // Handle file upload
    $upload_dir = "uploads/products/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
    }

    $file_name = basename($_FILES["product_photo"]["name"]);
    $file_path = $upload_dir . $file_name;
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

    // Validate file type
    $allowed_types = array('jpg', 'jpeg', 'png');
    if (!in_array($file_type, $allowed_types)) {
        echo "<script>alert('Only JPG, JPEG, and PNG files are allowed.');</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["product_photo"]["tmp_name"], $file_path)) {
        // Insert into database
        $stmt = $mysqli->prepare("INSERT INTO products (product_name, product_photo, keywords) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $product_name, $file_path, $keywords);

        if ($stmt->execute()) {
            echo "<script>alert('Product added successfully.'); window.location.href = 'dashboard.php';</script>";
        } else {
            echo "<script>alert('Error: " . $stmt->error . "');</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Failed to upload image.');</script>";
    }

    $mysqli->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Cascadia Code !important;
        }
        .form-container {
            background-color:rgb(233, 235, 238);
            border-radius: 8px;
            padding: 20px;
            max-width: 500px;
            margin: 50px auto;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h2 {
            color: #6b0ea5;
        }

        .btn-purple {
            background-color:#6b0ea5;
            color: white;
            border: none;
            border-radius: 30px;
            width: 50% !important;
                   }
                   
        .btn-purple:hover {
            background-color: #6b0ea5;
        }

        label {
            color: #6b0ea5;
            font-weight: 500;
        }
        .form-control:focus {
            outline: none;
            border: 1px solid #6b0ea5;
            box-shadow: 0 0 5px #6b0ea5;
            

        }
.form-control{
    border-radius: 30px;
}
.submit-container {
            display: flex;
            justify-content: center !important;
        }


    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2 class="text-center">ADD PRODUCT</h2>
            <form action="add_product.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="product_name" class="form-label">Product Name:</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
                </div>

                <div class="mb-3">
                    <label for="product_photo" class="form-label">Product Photo:</label>
                    <input type="file" class="form-control" id="product_photo" name="product_photo" accept=".png, .jpeg, .jpg" required>
                </div>

                <div class="mb-3">
                    <label for="keywords" class="form-label">Keywords:</label>
                    <textarea class="form-control" id="keywords" name="keywords" rows="4"></textarea>
                </div>
                <div class="submit-container">
                <button type="submit" class="btn btn-purple w-100">Add Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

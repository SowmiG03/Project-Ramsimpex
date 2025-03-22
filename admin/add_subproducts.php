<?php
include "session_check.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Database connection
 include "database.php";

    // Get form data
    $subproduct_name = $_POST['subproduct_name'];
    $product_id = $_POST['product_id'];
    $keywords = $_POST['keywords'];

    // Handle file upload
    $upload_dir = "uploads/subproducts/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true); // Create directory if it doesn't exist
    }

    $file_name = basename($_FILES["subproduct_photo"]["name"]);
    $file_path = $upload_dir . $file_name;
    $file_type = strtolower(pathinfo($file_path, PATHINFO_EXTENSION));

    // Validate file type
    $allowed_types = array('jpg', 'jpeg', 'png');
    if (!in_array($file_type, $allowed_types)) {
        echo "<script>alert('Only JPG, JPEG, and PNG files are allowed.');</script>";
        exit;
    }

    if (move_uploaded_file($_FILES["subproduct_photo"]["tmp_name"], $file_path)) {
        // Insert into database
        $stmt = $mysqli->prepare("INSERT INTO subproducts (subproduct_name, subproduct_photo, keywords, product_id) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $subproduct_name, $file_path, $keywords, $product_id);

        if ($stmt->execute()) {
            echo "<script>alert('Subproduct added successfully.'); window.location.href = 'dashboard.php';</script>";
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
    <title>Add Subproduct</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            color: #333;
            font-family: Cascadia Code !important;

        }
        h2 {
            color: #6b0ea5; /* Purple */
        }
        .container {
        
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        width:50%;
        background-color:rgb(233, 235, 238);
          
        
        }
        .form-control:focus {
            outline: none;
            border: 1px solid #6b0ea5;
            box-shadow: 0 0 5px #6b0ea5;
            

        }
        .form-label {
            color: #6b0ea5; /* Purple */
        }
        .btn-purple {
            background-color: #6b0ea5;
            color: white;
            border-radius: 30px;
            width: 50% !important;
        }
        .btn-purple:hover {
            background-color: #6b0ea5;
        }
        .form-control {
            border-radius: 30px;
           
        }
        .submit-container {
            display: flex;
            justify-content: center !important;
        }


    </style>
</head>
<body>

    <div class="container mt-5">
        <h2 class="text-center">ADD SUBPRODUCT</h2>
        <form action="add_subproducts.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="subproduct_name" class="form-label">Subproduct Name:</label>
                <input type="text" id="subproduct_name" name="subproduct_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="product_id" class="form-label">Main Product:</label>
                <select id="product_id" name="product_id" class="form-control" required>
                    <option value="">-- Select Main Product --</option>
                    <?php
                    // Database connection
                    include "database.php";
                    // Fetch main products
                    $result = $mysqli->query("SELECT product_id, product_name FROM products");
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row['product_id'] . "'>" . $row['product_name'] . "</option>";
                        }
                    } else {
                        echo "<option value=''>No Products Available</option>";
                    }
                    $mysqli->close();
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="subproduct_photo" class="form-label">Subproduct Photo:</label>
                <input type="file" id="subproduct_photo" name="subproduct_photo" class="form-control" accept=".png, .jpeg, .jpg" required>
            </div>

            <div class="mb-3">
                <label for="keywords" class="form-label">Keywords:</label>
                <textarea id="keywords" name="keywords" class="form-control" rows="4" required ></textarea>
            </div>
            <div class="submit-container">
            <button type="submit" class="btn btn-purple w-100">Add Subproduct</button>
            </div>
        </form>
    </div>

    <script>
document.addEventListener('DOMContentLoaded', function () {
    const nameInput = document.getElementById('subproduct_name');
    const keywordsInput = document.getElementById('keywords');

    // Validate subproduct name
    nameInput.addEventListener('input', function () {
        const namePattern = /^(?!.*\d{2,})[a-zA-Z\s\d]{1,30}$/;
        if (!namePattern.test(this.value)) {
            this.setCustomValidity("Invalid subproduct name: No continuous digits or special characters allowed.");
        } else {
            this.setCustomValidity("");
        }
    });

    // Validate keywords
    keywordsInput.addEventListener('input', function () {
        const keywordsPattern = /^([a-zA-Z\s]+(,[a-zA-Z\s]+)*)?$/;
        if (!keywordsPattern.test(this.value)) {
            this.setCustomValidity("Invalid keywords: Use letters only, separated by commas.");
        } else {
            this.setCustomValidity("");
        }
    });
});
</script>


    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>
</html>

<?php
include "session_check.php";
// Include database connection
include "database.php";

// Check if a subproduct ID is passed
if (isset($_GET['subproduct_id'])) {
    $subproduct_id = $_GET['subproduct_id'];

    // Fetch the subproduct details from the database
    $query = "SELECT * FROM subproducts WHERE subproduct_id = '$subproduct_id'";
    $result = mysqli_query($mysqli, $query);

    // Check if the subproduct exists
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "Subproduct not found!";
        exit;
    }
}

// Update the subproduct details
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subproduct_name = $_POST['subproduct_name'];

    // Check if a new image is uploaded
    if (!empty($_FILES['subproduct_photo']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES['subproduct_photo']['name']);
        move_uploaded_file($_FILES['subproduct_photo']['tmp_name'], $target_file);
    } else {
        // Keep the existing image
        $target_file = $row['subproduct_photo'];
    }

    // Update query
    $update_query = "UPDATE subproducts SET subproduct_name = '$subproduct_name', subproduct_photo = '$target_file' WHERE subproduct_id = '$subproduct_id'";

    if (mysqli_query($mysqli, $update_query)) {
        echo "Subproduct updated successfully!";
        header("Location: view_subproducts.php"); // Redirect to view page
        exit;
    } else {
        echo "Error updating subproduct!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Subproduct</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            color: #4b0082;
        }
        .container {
            background-color:  #f4f0ff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: 50px auto;
        }
        h2 {
            color: #6a0dad;
            text-align: center;
        }
        .form-label {
            font-weight: bold;
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
        }
        img {
    display: block;
    margin: 0 auto; /* Centers the image horizontally */
    border-radius: 5px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
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
    <h2 class="text-center">EDIT SUBPRODUCT</h2>
    <form method="POST" action="edit_subproduct.php?subproduct_id=<?php echo $subproduct_id; ?>" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="subproduct_name" class="form-label">Subproduct Name</label>
            <input type="text" class="form-control" id="subproduct_name" name="subproduct_name" value="<?php echo $row['subproduct_name']; ?>" required>
        </div>
        <div class="mb-3">
            <label for="subproduct_photo" class="form-label">Subproduct Photo</label>
            <input type="file" class="form-control" id="subproduct_photo" name="subproduct_photo">
            <img src="<?php echo $row['subproduct_photo']; ?>" alt="Current Photo" width="100" class="mt-2">
        </div>
        <div class="submit-container">
        <button type="submit" class="btn btn-primary">Update Subproduct</button>
        </div>
    </form>
</div>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

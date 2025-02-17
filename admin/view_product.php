<?php

include "session_check.php";
include "database.php";

// Fetch all products from the database
$query = "SELECT * FROM products";
$result = mysqli_query($mysqli, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">View Products</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product Name</th>
                <th>Product Photo</th>
                <th>Keywords</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['product_name']; ?></td>
                <td><img src="<?php echo $row['product_photo']; ?>" alt="Product Image" width="50"></td>
                <td><?php echo $row['keywords']; ?></td>
                <td>
                    <?php if ($row['status'] == 'enabled') { ?>
                        <!-- Disable Button for enabled products -->
                        <a href="disable_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm">Disable</a>
                    <?php } else { ?>
                        <!-- Enable Button for disabled products -->
                        <a href="disable_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-success btn-sm">Enable</a>
                    <?php } ?>
                    <!-- Edit Button -->
                    <a href="edit_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

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
    <style>
        body {
            background-color: #f8f9fa;
            
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #6f42c1;
        }
        .table {
            background-color: #fff;
        }
        .table th {
            background-color: #6f42c1;
            color: white;
        }
        .btn-primary {
            background-color: #6f42c1 !important;
            border-color: #6f42c1 !important;
        }
        .btn-primary:hover {
            background-color: #5a32a3;
        }
        .btn-danger {
            background-color: #6f42c1;
            border-color: #6f42c1;
            color: #f8f9fa;
        }

        .btn-danger:hover {
            background-color:rgb(243, 241, 247);
            color: #6f42c1;
            border-color: #6f42c1;
                   }


        .btn-warning {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }


        .table tbody tr:nth-child(odd) {
            background-color:rgb(237, 236, 239);
        }
    </style>
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
                        <a href="disable_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-danger btn-sm">Disable</a>
                    <?php } else { ?>
                        <a href="disable_product.php?product_id=<?php echo $row['product_id']; ?>" class="btn btn-success btn-sm">Enable</a>
                    <?php } ?>
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

<?php
include "session_check.php";
// Include database connection
include "database.php";

// Fetch all subproducts from the database
$query = "
    SELECT products.product_name, subproducts.subproduct_id, subproducts.subproduct_name, subproducts.subproduct_photo 
    FROM products
    LEFT JOIN subproducts ON products.product_id = subproducts.product_id
    ORDER BY products.product_name, subproducts.subproduct_name";
$result = mysqli_query($mysqli, $query);
$current_product = '';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subproducts</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">View Subproducts</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Subproduct Name</th>
                <th>Subproduct Photo</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        <?php
        // Check if there are any products and subproducts
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                // If the product name changes, display the new product name
                if ($current_product != $row['product_name']) {
                    $current_product = $row['product_name'];
                    echo "<tr><th colspan='4' class='bg-light font-weight-bold text-center'>" . $current_product . "</th></tr>";
                }
                ?>
                <tr>
                    <td><?php echo $row['subproduct_name']; ?></td>
                    <td><img src="<?php echo $row['subproduct_photo']; ?>" alt="Subproduct Image" width="50"></td>
                    <td>
                        <!-- View Button -->
                        <a href="edit_subproduct.php?subproduct_id=<?php echo $row['subproduct_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                        <!-- Delete Button -->
                        <a href="delete_subproduct.php?subproduct_id=<?php echo $row['subproduct_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='4'>No products or subproducts found.</td></tr>";
        }
        ?>
    </tbody>
    </table>
</div>

<!-- Include Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

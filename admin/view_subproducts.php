<?php
include "session_check.php";
include "database.php";

// Pagination Variables
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $limit;

// Get Total Records
$count_query = "
    SELECT COUNT(*) AS total
    FROM subproducts
    LEFT JOIN products ON products.product_id = subproducts.product_id";
$count_result = mysqli_query($mysqli, $count_query);
$total_rows = mysqli_fetch_assoc($count_result)['total'];
$total_pages = ceil($total_rows / $limit);

// Fetch Data with Pagination
$query = "
    SELECT products.product_name, subproducts.subproduct_id, subproducts.subproduct_name, subproducts.subproduct_photo 
    FROM products
    LEFT JOIN subproducts ON products.product_id = subproducts.product_id
    ORDER BY products.product_name, subproducts.subproduct_name
    LIMIT $limit OFFSET $offset";
$result = mysqli_query($mysqli, $query);
$current_product = '';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Subproducts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: white;
            color: #4b0082;
        }
        .container {
            background-color: #f4f0ff;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #6a0dad;
        }
        .table {
            border: 1px solidrgb(207, 207, 208);
        }
        .table th {
            background-color: #6a0dad;
            color: white;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .btn-info {
            background-color: #6a0dad;
            color: white;
            border: none;
        }
        .btn-info:hover {
            background-color:rgb(207, 203, 209);
        color: #6a0dad;
        }
        .btn-danger {
            background-color: #a10035;
            border: none;
        }
        .btn-danger:hover {
            background-color: #800026;
        }
        img {
            border-radius: 5px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);
        }


        .bg-purple {
    background-color:rgb(207, 203, 209) !important;
    color: #6a0dad !important;
}
.table tbody tr:nth-child(odd) {
            background-color:rgb(237, 236, 239);
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <h2 class="text-center">VIEW SUBPRODUCTS</h2>
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
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($current_product != $row['product_name']) {
                    $current_product = $row['product_name'];
                    // echo "<tr><th colspan='3' class='bg-light font-weight-bold text-center text-purple'>" . $current_product . "</th></tr>";
               
                    echo "<tr><th colspan='3' class='bg-purple text-white font-weight-bold text-center'>" . $current_product . "</th></tr>";

                }
                ?>
                <tr>
                    <td><?php echo $row['subproduct_name']; ?></td>
                    <td><img src="<?php echo $row['subproduct_photo']; ?>" alt="Subproduct Image" width="50"></td>
                    <td>
                        <a href="edit_subproduct.php?subproduct_id=<?php echo $row['subproduct_id']; ?>" class="btn btn-info btn-sm">Edit</a>
                        <a href="delete_subproduct.php?subproduct_id=<?php echo $row['subproduct_id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='3'>No products or subproducts found.</td></tr>";
        }
        ?>
    </tbody>
    </table>
    <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <!-- Previous Button -->
    <li class="page-item <?php echo ($page <= 1) ? 'disabled' : ''; ?>">
      <a class="page-link" href="?page=<?php echo $page - 1; ?>">Previous</a>
    </li>

    <!-- Page Numbers -->
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <li class="page-item <?php echo ($i == $page) ? 'active' : ''; ?>">
        <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
      </li>
    <?php endfor; ?>

    <!-- Next Button -->
    <li class="page-item <?php echo ($page >= $total_pages) ? 'disabled' : ''; ?>">
      <a class="page-link" href="?page=<?php echo $page + 1; ?>">Next</a>
    </li>
  </ul>
</nav>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

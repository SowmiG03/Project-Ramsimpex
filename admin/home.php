<?php
include "session_check.php";
include "database.php";
// Query for total products
$totalProducts = $mysqli->query("SELECT COUNT(*) AS total FROM products")->fetch_assoc()['total'];

// Query for total subproducts
$totalSubproducts = $mysqli->query("SELECT COUNT(*) AS total FROM subproducts")->fetch_assoc()['total'];

// Query for active products
$activeProducts = $mysqli->query("SELECT COUNT(*) AS total FROM products WHERE status = 'enabled'")->fetch_assoc()['total'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
.card {
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.2);
    transition: transform 0.3s;
    display: inline-block;
}
.card:hover {
    transform: scale(1.05);
}
</style>
<!-- Bootstrap 5 CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Bootstrap 5 JS Bundle (includes Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>
<body>
<div class="row text-center m-5">
    <!-- Total Products -->
    <div class="col-md-4">
        <div class="card text-bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <p class="card-text"><?php echo $totalProducts; ?></p>
            </div>
        </div>
    </div>

    <!-- Total Subproducts -->
    <div class="col-md-4">
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Subproducts</h5>
                <p class="card-text"><?php echo $totalSubproducts; ?></p>
            </div>
        </div>
    </div>

    <!-- Active Products -->
    <div class="col-md-4">
        <div class="card text-bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Active Products</h5>
                <p class="card-text"><?php echo $activeProducts; ?></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>


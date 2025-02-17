<?php
// Include database connection
include "admin/database.php";

// Check if a product name is passed in the URL
if (isset($_GET['product_name'])) {
    $product_name = $_GET['product_name'];

    // SQL query to fetch the main product details
    $product_sql = "SELECT * FROM products WHERE product_name = ?";
    $stmt = $mysqli->prepare($product_sql);
    $stmt->bind_param("s", $product_name);
    $stmt->execute();
    $product_result = $stmt->get_result();
    
    if ($product_result->num_rows > 0) {
        $product = $product_result->fetch_assoc();
    } else {
        // If no product is found, redirect to an error or home page
        header("Location: index.php");
        exit();
    }

    // SQL query to fetch the associated subproducts
    $subproduct_sql = "SELECT * FROM subproducts WHERE product_id = ?";
    $sub_stmt = $mysqli->prepare($subproduct_sql);
    $sub_stmt->bind_param("i", $product['product_id']);
    $sub_stmt->execute();
    $subproducts_result = $sub_stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $product['product_name']; ?> - Product Details</title>
    <!-- Add Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
  <!-- Font Awesome for Icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<link rel="stylesheet" href="subCss.css">

</head>
<body>


<a href="products.php" class="back-btn">
<i class='fas fa-arrow-alt-circle-left' style='font-size:36px'></i>
</a>
<!-- Product and Subproduct Grid -->
<div class="container text-center">
   <!-- Main Product (Centered Below) -->
<div class="row justify-content-center mt-4">
    <div class="col-md-6 col-sm-8 wow animate__animated animate__fadeInTopLeft" data-wow-delay="5s">
        <div class="img-container">
            <img src="admin/<?php echo $product['product_photo']; ?>" 
                 alt="<?php echo $product['product_name']; ?>" 
                 class="img-fluid img-thumbnail main-product-img" 
                 onclick="expandImage(this);">
            <div class="img-name"><?php echo $product['product_name']; ?></div>
        </div>
    </div>
</div>

<!-- Subproducts Row (Top) -->
<div class="row justify-content-center mt-5">
    <?php while ($subproduct = $subproducts_result->fetch_assoc()) { ?>
        <div class="col-md-4 col-sm-6 col-12">
            <div class="img-container">
                <img src="admin/<?php echo $subproduct['subproduct_photo']; ?>" 
                     alt="<?php echo $subproduct['subproduct_name']; ?>" 
                     class="img-fluid img-thumbnail subproduct-img" 
                     onclick="expandImage(this);">
                <div class="img-name"><?php echo $subproduct['subproduct_name']; ?></div>
            </div>
        </div>
    <?php } ?>
</div>



</div>

<!-- Expanded Image View -->
<div class="expanded-container text-center" id="expandedContainer">
    <span onclick="closeExpanded()" class="close-btn">&times;</span>
    <img id="expandedImg" class="img-fluid">
    <div id="imgText"></div>
</div>


<!-- Expanded Image View -->
<div class="expanded-container text-center" id="expandedContainer">
    <span onclick="closeExpanded()" class="close-btn">&times;</span>
    <img id="expandedImg" class="img-fluid">
    <div id="imgText"></div>
</div>


<!-- Add Bootstrap JS and dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              function expandImage(img) {
    document.getElementById("expandedImg").src = img.src;
    document.getElementById("imgText").innerText = img.alt;
    document.getElementById("expandedContainer").style.display = "flex";
}

function closeExpanded() {
    document.getElementById("expandedContainer").style.display = "none";
}


              </script>
</body>
</html>

<?php
// Close database connection
$mysqli->close();
?>

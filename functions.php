<?php
function displayProducts() {
    // Include database connection
    include "admin/database.php";

    // SQL query to fetch products
    $sql = "SELECT * FROM products where status='enabled'";
    $result = $mysqli->query($sql);

    // Loop through the results
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-md-4">
            <figure class="text-center animate__animated animate__fadeInUp" data-wow-delay="2s">
                <div class="portfolio-item">
                    <img src="admin/<?php echo $row['product_photo']; ?>" class="img-fluid" alt="<?php echo $row['product_name']; ?>">
                    <figcaption class="mt-2 text-dark bg-white">
                        <!-- Link to the product details page with the product name or ID as a parameter -->
                        <a href="subproducts.php?product_id=<?php echo urlencode($row['product_id']); ?>" class="product-link"><?php echo $row['product_name']; ?></a>
                    </figcaption>
                </div>
            </figure>
        </div>
        <?php
    }

    // Close database connection
    $mysqli->close();
}

function displayProductsIndex() {
    // Include database connection
    include "admin/database.php";

    // SQL query to fetch products
    $sql = "SELECT * FROM products where status='enabled'";
    $result = $mysqli->query($sql);

    // Start the sliding wrapper
    ?>
    <div class="slider-container">
        <div class="slider">
            <?php
            while ($row = $result->fetch_assoc()) {
                ?>
                <div class="slide">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-front">
                                <img src="admin/<?php echo $row['product_photo']; ?>" class="img-fluid" alt="<?php echo $row['product_name']; ?>">
                            </div>
                            <div class="flip-card-back">
                            <a href="subproducts.php?product_id=<?php echo urlencode($row['product_id']); ?>"><?php echo $row['product_name']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php

    // Close database connection
    $mysqli->close();
}

function display_video()
{
    include "admin/database.php";
    $sql = "SELECT * FROM videoes LIMIT 1";
        $result = $mysqli->query($sql);
    while ($row = $result->fetch_assoc()) {
        ?>
        <div class="col-12 col-md-6 mx-3 wow animate__animated animate__backInLeft">
            <div class="ratio ratio-16x9">
                <iframe src="<?php echo htmlspecialchars($row['url']); ?>" title="YouTube video" allowfullscreen></iframe>
            </div>
        </div>
        <?php
    }

    // Close database connection
    $mysqli->close();
}
?>


<?php
// Database connection
function getDetails() {
    include "admin/database.php";

    // Fetch details from the database
    $sql = "SELECT * FROM details";
    $result = $mysqli->query($sql);

    $details = [];
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $details[] = $row;
        }
    }
    $mysqli->close();
    return $details;
}
?>

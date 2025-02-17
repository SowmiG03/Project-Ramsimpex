<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    <!-- browser logo -->
    <link rel="icon" href="images/logo1.jpeg" sizes="512x512" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- wow.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <!-- animate.style -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- External style sheet -->
    <link rel="stylesheet" href="style.css?v=1.0">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    <style>
        .portfolio-item {
          position: relative;
          overflow: hidden;
        }
        
        .portfolio-item img {
          width: 100%;
          transition: transform 0.3s ease;
        }
        
        .portfolio-item:hover img {
          transform: translateY(-50px); /* Move the image up a little */
        }
        
        .portfolio-item figcaption {
          position: absolute;
          bottom: -30px; /* Initially hidden below the image */
          left: 0;
          right: 0;
          padding: 10px;
          background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
          color: white;
          transition: bottom 0.3s ease;
          opacity: 0; /* Initially hidden */
        }
        
        .portfolio-item:hover figcaption {
          bottom: 0; /* Show the caption */
          opacity: 1; /* Make it visible */
          color:#6b0ea5;
        }
        .btn{
            background-color: #6b0ea5!important;
         color: #fff!important; /* Ensures text is readable */
        border: none; /* Removes border */
         font-size: medium;
         width: 150px;
         height: 50px;
         
        }
        .btn:hover{
            background-color : #6b0ea580 !important;/* Darker shade for hover effect */
      color: #fff;
        }
@media (min-width: 768px) {
    .search-container {
        position: sticky;
        top: 0;
        right: 0;
        display: flex;
        justify-content: flex-end;
        margin-right: 2rem; /* Adjust as needed */
    }
}

/* Center positioning for small devices */
@media (max-width: 767.98px) {
    .search-container {
        display: flex;
        justify-content: center;
        margin-top: 1rem; /* Optional: add spacing */
    }
}
.product-link {
    font-size: 20px;
    font-weight: bold;
    color: #6b0ea5!important ;/* Bootstrap blue */
    text-decoration: none; /* Removes underline */
    transition: color 0.3s ease-in-out;
}

.product-link:hover {
    color: #6b0ea580 !important  ; /* Changes color on hover */
    text-decoration: underline; /* Adds underline on hover */
}


.search-container input {
    font-size: 16px;
    outline: none;
    border: 2px solid #6a0dad;
    border-radius: 5px;
    box-shadow: 0 0 8px #6a0dad;
    transition: all 0.3s ease-in-out;
}

.search-container input:focus {
    box-shadow: 0 0 12px #6a0dad;
    border: 2px solid #6a0dad;
}

    </style>

</head>
  <body>
    <?php include("navbar.php") ?>
    <div class="row text-center m-5 position-relative">
    <div class="search-container d-flex justify-content-center">
        <form id="searchForm" class="d-flex">
            <input type="text" id="searchInput" placeholder="Search products..." class="form-control me-2 w-100" />
            <!-- <button type="submit" class="btn"><i class="fa fa-fw fa-search"></i>&nbsp;&nbsp;Search</button> -->
        </form>
    </div>

    <!-- Heading -->
    <div class="col-12 mt-5">
        <div class="display-3">Our Products</div>
        <div class="h4">New stunning products for our amazing clients</div>
    </div>
</div>



<div class="container-fluid">
    <!-- Search Results -->
    <div id="searchResults" class="row mt-4" style="display: none;">
        <!-- Search results will be dynamically injected here -->
    </div>

    <!-- All Products Section -->
    <div id="allProducts" class="row">
        <?php
        include("functions.php");
        displayProducts();
        ?>
    </div>
</div>


    <div class="row mb-0">
        <div class="col-12 col-md-5  m-4 p-4 text-center h4">
            Let's make something great together<br> 
            <span class="h6">Get in touch with us and send some basic info for a quick quote</span>
        </div>
        
        <div class="col-12 col-md-5 mb-3 d-flex justify-content-center justify-content-md-end align-items-center pe-5">
            <a href="contact.php" class=" btn-edge">Click Me</a>
        </div>
    </div>

    <?php include("footer.php") ?>

    <script src="js/wow.min.js"></script>
    <script> 
    new WOW().init();
     </script>
    <!-- javascript -->
    <script>
let debounceTimer;

document.getElementById('searchInput').addEventListener('input', function () {
    const query = this.value.trim();

    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
        if (query) {
            fetch(`search.php?query=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    const resultsContainer = document.getElementById('searchResults');
                    const allProductsContainer = document.getElementById('allProducts');
                    
                    resultsContainer.innerHTML = ''; // Clear previous results

                    if (data.length > 0) {
                        // Hide all products section
                        allProductsContainer.style.display = 'none';
                        resultsContainer.style.display = 'flex';

                        // Display the search results
                        data.forEach(product => {
                            resultsContainer.innerHTML += `
                                <div class="col-md-4">
                                    <figure class="text-center animate__animated animate__fadeInUp">
                                        <div class="portfolio-item">
                                            <img src="admin/${product.product_photo}" class="img-fluid" alt="${product.product_name}">
                                            <figcaption class="mt-2 text-dark bg-white">
                                                <a href="subproducts.php?product_name=${encodeURIComponent(product.product_name)}" class="product-link">${product.product_name}</a>
                                            </figcaption>
                                        </div>
                                    </figure>
                                </div>
                            `;
                        });
                    } else {
                        resultsContainer.innerHTML = '<p class="text-muted">No products found.</p>';
                        resultsContainer.style.display = 'flex';
                        allProductsContainer.style.display = 'none';
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            // Show all products if the input is empty
            document.getElementById('searchResults').style.display = 'none';
            document.getElementById('allProducts').style.display = 'flex';
        }
    }, 300); // Debounce time: 300ms
});

    </script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>


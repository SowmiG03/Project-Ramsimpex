<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Infrastructure</title>
    <link rel="icon" href="images/logo1.jpeg" sizes="512x512" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <style>
      
.text-medium-gray {
  font-size: 15px;
  color: #6c757d; /* Adjust this HEX value for the desired gray shade */
}

    </style>
    
</head>
<body>
    <?php include "navbar.php"?>
    <div class="container-fluid p-0">
    <div id="carouselEg" class="carousel slide" >
    <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselEg" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselEg" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselEg" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/slide1.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/slide2.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="images/slide3.jpeg" class="d-block w-100" alt="...">
    </div>
  </div>
</div>
    </div>
    <div class="container">
  <div class="row justify-content-center m-3">
    <div class="col-12 col-md-6 text-center">
      <h6>Infrastructure</h6>
      <p class="text-medium-gray text-uppercase">
        We handle from undyed yarn to packed finished goods at the factory. The pictures below will give you an overview of the factory.
      </p>
    </div>
  </div>
</div>

    

    <?php  include "footer.php" ?>
</body>
</html>
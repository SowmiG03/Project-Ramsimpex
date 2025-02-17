<?php  include("functions.php");  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rams Impex</title>
    <link rel="icon" href="images/logo1.jpeg" sizes="512x512" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
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
}
/* Slider container */
.slider-container {
    width: 100%;
    overflow: hidden;
    position: relative;
    height: 300px; /* Adjust height based on card size */
}

.slider {
    display: flex;
    width: max-content;
    animation: slide 55s linear infinite; /* Continuous sliding */
}

.slide {
    min-width: 200px; /* Width of each card */
    margin: 20px; /* Spacing between cards */
    display: flex;
    justify-content: center;
    align-items: center;
}

/* Flip card styles */
.flip-card {
    background-color: transparent;
    width: 250px;
    height: 250px;
    perspective: 1000px;
}

.flip-card-inner {
    position: relative;
    width: 100%;
    height: 100%;
    text-align: center;
    transition: transform 0.8s;
    transform-style: preserve-3d;
}

.flip-card:hover .flip-card-inner {
    transform: rotateY(180deg);
}

.flip-card-front, .flip-card-back {
    position: absolute;
    width: 100%;
    height: 100%;
    backface-visibility: hidden;
}

.flip-card-front {
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #f8f9fa;
    border: 1px solid #ccc;
}

.flip-card-back {
    background-color: white;
    color: black;
    transform: rotateY(180deg);
    display: flex;
    align-items: center;
    justify-content: center;
    border: 1px solid #ccc;
}

.flip-card-back a {
    color: black;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    font-family: monospace;
}

.flip-card-back a:hover {
   color:#6b0ea5;
    text-decoration: underline;
}

/* Keyframes for sliding animation */
@keyframes slide {
    from {
        transform: translateX(0);
    }
    to {
        transform: translateX(-100%);
    }
}
    </style>
</head>    
   <?php include("navbar.php") ?>
    
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active" data-bs-interval="10000">
                <img src="images/slide1.jpeg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item" data-bs-interval="2000">
                <img src="images/slide2.jpeg" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="images/slide3.jpeg" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>



          <div class="row mt-2 d-flex align-items-center justify-content-center wow animate__animated animate__fadeIn" data-wow-delay="1s">
            <div class="col-12  col-lg-6 col-md-6 mb-0 pb-0">
                <img src="images/logo.png" class="img-fluid w-50 h-50 rounded mx-auto d-block pt-4 "  alt="...">
            </div>
            <div class="col-12 text-center  col-lg-6 col-md-6  mt-5 mt-md-0 ">
                <div class="alt-font text-medium-gray margin-15px-bottom text-uppercase text-small">About Us</div>
                <h4 class="font-weight-600 alt-font text-extra-dark-gray ">
                    "We Care Your Needs!!."<br> <small>~ Owner</small>
                </h4>
                <p class="width-80 lg-width-100">
                    <strong class="count">29</strong> Years of Experience
                </p>
                <a href="about.html" class="btn btn-small btn-custom rounded-pill px-4 py-2">View More</a>
            </div>
           
        </div>




        <div class="row mt-3">
           <?php display_video(); ?>
        
        
            <div class="col-12 col-md-5 m-3 pt-3 wow animate__animated animate__backInRight">
                <div class="h3 text-center">Infrastructure
                    </div>
                    <p class="text-justify py-4" >We handle from undyed yarn to packed finished goods at the factory. The pictures below will give you an overview of the factory. 
                        Please click on the below you tube link to know more about our infrastructure.</p>
                        <a href="#" class="btn btn-custom rounded-pill px-4 py-2">View More</a>

            </div>
          </div>
          <div class="row text-center m-5">
            <div class="display3">Our Products</div>
            <div class="h4">  New stunning products for our amazing clients</div>
          </div>
       
        
         
        <div class="container-fluid ">
    <div class="row">
        
      <?php displayProductsIndex(); ?>
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
    
               
          </div>
       <?php  include("footer.php")?>
        
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   
</body>

</html>
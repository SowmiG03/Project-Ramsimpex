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
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- boostrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- External style sheet -->
    <link rel="stylesheet" href="style.css?v=2.0">
    <!-- Swiper -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

<style>
  .swiper-container {
    width: 100%; /* Ensure the container spans the full width */
    height: auto; /* Adjust height automatically */
}

.swiper-slide {
    display: flex;
    justify-content: center; /* Center images horizontally */
    align-items: center;    /* Center images vertically */
}

.swiper-slide img {
    max-width: 100%; /* Image fits within the container */
    height: auto;    /* Maintain aspect ratio */
    object-fit: contain; /* Prevent cropping */
}

</style>

   
</head>
  <body>
  <?php include("navbar.php"); ?>
  
    <div class="container-fulid">
        <div class="row m-3">
          <div class="h6 text-center text-muted text-uppercase my-4 animate__animated animate__pulse"> About Rams Impex</div>
            <div class="ratio ratio-21x9">
                <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
              </div>
        </div>
        <div class="row m-3 d-flex justify-content-center align-items-center wow animate__animated animate__fadeIn" data-wow-delay="1s">
  <div class="col-12 col-md-6 mb-3">
    <img src="images/logo.png" class="img-fluid w-50 h-50 mx-auto d-block pt-4" alt="...">
  </div>
  <div class="col-12 col-md-6">
    <div class="h4 pt-md-4 text-center" style="font-size:20px;">Introducing Rams Impex</div>
    <p style="font-size:18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Our <b>QPD</b> attitude of <b><i>QUALITY, PRICE and DELIVERY</i></b>, we attain a good position within 
    the leading manufacturing companies in India.</p>
    <ul class="tick-list"  style="font-size:20px;padding-left: 20px; line-height: 1.8;">
      <li> &nbsp;&nbsp;Wide Range of Products</li>
      <li> &nbsp;&nbsp;Innovative Product Offerings</li>
      <li> &nbsp;&nbsp;International Experience</li>
      <li>&nbsp;&nbsp;Commitment to Quality</li>
      <li> &nbsp;&nbsp;Customer-Centric Approach</li>
    </ul>
  </div>
</div>
        <section class="wow animate__animated animate__fadeIn mt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-lg-7 text-center margin-100px-bottom sm-margin-40px-bottom">
                <div class="position-relative overflow-hidden w-100">
                    <span class="text-small text-outside-line-full alt-font font-weight-600 text-uppercase" ><b>Our International Buyers</b></span>
                </div>
            </div>
        </div>
        <div class="row mt-5">
        <div class="swiper-container swiper-slider-clients">
                <div class="swiper-wrapper">
                    <div class="swiper-slide text-center mx-3">
                        <img src="images/canada.webp" alt="Slide 3" class="img-fluid">
                    </div>
                    <div class="swiper-slide text-center mx-3">
                        <img src="images/usa.png" alt="Slide 3" class="img-fluid">
                    </div>
                    <div class="swiper-slide text-center mx-3">
                        <img src="images/europe.png" alt="Slide 3" class="img-fluid">
                    </div>
                    <div class="swiper-slide text-center mx-3">
                        <img src="images/japan.jpg" alt="Slide 3" class="img-fluid">
                    </div>
            
                
                </div>
            
            </div>
        </div>
    </div>
</section>

  
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

    </div>
    <?php include("footer.php") ?>
    

    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
              <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

               <script>
               var swiper = new Swiper('.swiper-container', {
    loop: true, // Enable loop mode
    autoplay: {
        delay: 3000, // Autoplay delay in milliseconds
        disableOnInteraction: false, // Continue autoplay after user interaction
    },
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1, // 1 image on very small screens
            spaceBetween: 30, // Space between slides
        },
        768: {
            slidesPerView: 2, // 2 images on medium screens (tablets)
            spaceBetween: 20,
        },
        1024: {
            slidesPerView: 3, // 3 images on larger screens (desktops)
            spaceBetween: 40,
        },
    },
});
               </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
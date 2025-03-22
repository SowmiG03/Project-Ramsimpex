<?php
session_start();
// print_r($_SESSION);

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>About Us</title>
    <!-- browser logo -->
    <link rel="icon" href="images/logo.png" sizes="512x512" type="image/png">
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
/* Container styling */
.brochure-container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    position: relative;
    padding: 20px;
}

/* Hand animation */
.hand-animation {
    font-size: 2rem;
    color: #6b0ea580! important;
    margin-bottom: 15px;
    animation: bounce 2s infinite;
    display: flex;
    flex-direction: column;
    align-items: center;
}

/* Quote text */
.quote-text {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 5px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
}

/* Bounce animation */
@keyframes bounce {
    0%, 100% {
        transform: translateY(0);
    }
    50% {
        transform: translateY(-10px);
    }
}

/* Button styling */
.brochure-btn {
    color:white;
    font-weight: bold;
    border: 2px solid #6b0ea580! important;
    background-color: #6b0ea580! important;
    font-size: 25px !important;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(170, 0, 255, 0.5);
    transition: transform 0.3s, box-shadow 0.3s;
}
.brochure-btn:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 10px rgba(170, 0, 255, 0.7);
}

  /* Centering the Tab navigation links */
  .nav-tabs {
    justify-content: center;

  }
  #loginRegisterModal .nav-tabs .nav-link {    color:  black! important;
    font-weight: bold;

  }
  #loginRegisterModal .nav-tabs .nav-link.active {    color: #6b0ea580! important;
    font-weight: bold;
    text-decoration: underline;
  }

.modal-title{
  text-align: center;
  width: 100%;
}
 
.tick-list li {
    font-size: 18px;
    padding-left: 20px;
    margin-left: 10px;
    position: relative;
  }

  .tick-list li::before {
    content: '\2022';  /* Unicode bullet character */
    position: absolute;
    left: 0;
    color: #6b0ea5; /* Bullet color */
    font-size: 24px;
  }

  .h4 {
    font-family: 'Arial', sans-serif;
    color: #333;
    font-weight: bold;
    letter-spacing: 0.5px;
  }

  p {
    font-family: 'Arial', sans-serif;
    color: #555;
    line-height: 1.6;
  }
  .btn-modal {
        background-color: #6b0ea5! important; /* Custom background color */
        border-color: #6b0ea5! important; /* Custom border color */
        color: white! important; /* Text color */
    }

    /* Hover effect */
    .btn-modal:hover {
        background-color: rgba(170, 0, 255, 0.7); /* Darker green on hover */
        border-color: #6b0ea5; /* Darker border on hover */
        cursor: pointer; /* Indicates button is clickable */
    }

</style>

   
</head>
  <body>

  <?php include("navbar.php"); ?>
  <!-- Login/Register Modal -->
<div class="modal fade" id="loginRegisterModal" tabindex="-1" aria-labelledby="loginRegisterModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginRegisterModalLabel">Need to Download Brochure?</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="authTabs" role="tablist">
          
          <li class="nav-item">
            <a class="nav-link active" id="register-tab" data-bs-toggle="tab" href="#registerUser" role="tab">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " id="login-tab" data-bs-toggle="tab" href="#login" role="tab">Login</a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content mt-3">
          
          <!-- Register Form -->
          <div class="tab-pane fade show active" id="registerUser" role="tabpanel">
            <form id="registerForm" action="registerUser.php" method="POST">
              <div class="mb-3">
                <label for="registerName" class="form-label">Full Name</label>
                <input type="text" class="form-control" id="registerName" name="name" required>
              </div>
              <div class="mb-3">
                <label for="registerEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="registerEmail" name="email" required>
              </div>
              <div class="mb-3">
                <label for="registerPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="registerPassword" name="password" required>
              </div>
              <button type="submit" class="btn btn-modal w-100">Register</button>
            </form>
          </div>
          <!-- Login Form -->
          <div class="tab-pane fade" id="login" role="tabpanel">
            <form id="loginForm" action="loginUser.php" method="POST">
              <div class="mb-3">
                <label for="loginEmail" class="form-label">Email</label>
                <input type="email" class="form-control" id="loginEmail" name="email" required>
              </div>
              <div class="mb-3">
                <label for="loginPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="loginPassword" name="password" required>
              </div>
              <button type="submit" class="btn btn-modal w-100">Login</button>
            </form>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

  
    <div class="container-fulid">
    <div class="row m-3 text-center">
    <div class="brochure-container position-relative">
        <!-- Hand Icon with Animated Text -->
        <div class="hand-animation">
            <span class="quote-text">"Download your Brochure for more collections"</span>
            👇
        </div>

        <!-- Download Button -->
        <a href="#" class="btn btn-primary brochure-btn" id="downloadBtn">Download Brochure</a>
        </div>
</div>

        
          <!-- <div class="h6 text-center text-muted text-uppercase my-4 animate__animated animate__pulse"> About Rams Impex</div>
            <div class="ratio ratio-21x9">
                <iframe src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" title="YouTube video" allowfullscreen></iframe>
              </div> -->
        <div class="row m-3 d-flex justify-content-center align-items-center wow animate__animated animate__fadeIn" data-wow-delay="1s">
  <div class="col-12 col-md-6 mb-3">
    <img src="images/logo.png" class="img-fluid w-50 h-50 mx-auto d-block pt-4" alt="...">
  </div>
  <div class="col-12 col-md-6">
    <!-- Title Section -->
    <div class="h4 pt-md-4 text-center" style="font-size: 26px; font-weight: 600; color: #333;">Introducing Rams Impex</div>
    
    <!-- Description Section -->
    <p style="font-size: 18px; text-align: justify; color: #555;">
      Our <b>QPD</b> attitude of <b><i>QUALITY, PRICE and DELIVERY</i></b>, has positioned us among the leading manufacturing companies in India.
    </p>

    <!-- Features List -->
    <ul class="tick-list" style="font-size: 20px; line-height: 1.8; list-style-type: none; padding-left: 0;">
      <li class="d-flex align-items-center mb-2">
        <span class="badge rounded-pill bg-success" style="width: 10px; height: 10px; margin-right: 10px;"></span> Wide Range of Products
      </li>
      <li class="d-flex align-items-center mb-2">
        <span class="badge rounded-pill bg-success" style="width: 10px; height: 10px; margin-right: 10px;"></span> Innovative Product Offerings
      </li>
      <li class="d-flex align-items-center mb-2">
        <span class="badge rounded-pill bg-success" style="width: 10px; height: 10px; margin-right: 10px;"></span> International Experience
      </li>
      <li class="d-flex align-items-center mb-2">
        <span class="badge rounded-pill bg-success" style="width: 10px; height: 10px; margin-right: 10px;"></span> Commitment to Quality
      </li>
      <li class="d-flex align-items-center mb-2">
        <span class="badge rounded-pill bg-success" style="width: 10px; height: 10px; margin-right: 10px;"></span> Customer-Centric Approach
      </li>
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

              
// Handle registration form submission
document.getElementById("registerForm").addEventListener("submit", function (event) {
      event.preventDefault(); // Prevent default form submission

      var formData = new FormData(this);

      fetch("registerUser.php", {
          method: "POST",
          body: formData,
      })
      .then(response => response.json())
      .then(data => {
        console.log(data);
          if (data.status === "success") {
              // Switch to Login tab
              document.getElementById("login-tab").click();

              // Pre-fill the login email field with registered email
              document.getElementById("loginEmail").value = document.getElementById("registerEmail").value;

              alert("Registration successful! Please log in.");
          } else {
              alert(data.message); // Show error if registration fails
          }
      })
      .catch(error => console.error("Error:", error));
  });

  document.getElementById("loginForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Prevent default form submission

    var formData = new FormData(this);

    fetch("loginUser.php", {
        method: "POST",
        body: formData,
    })
    .then(response => response.json())  // Parse the response as JSON
    .then(data => {
        if (data.status === "success") {
            // Display success alert
            alert(data.message);

            // Close the modal after successful login
            $('#loginRegisterModal').modal('hide');  // This hides the modal

            // Optionally, you can redirect to another page or change UI elements
            // window.location.href = "somepage.html"; // For example, redirect to another page
        } else {
            // Display error alert
            alert(data.message);
        }
    })
    .catch(error => {
        console.error("Error:", error);
        alert("There was an issue with the login. Please try again.");
    });
});
 
    document.getElementById("downloadBtn").addEventListener("click", function(event) {
    event.preventDefault(); // Prevent default link action

    // First, check if the user is logged in and the file is ready
    fetch("downloadBroucher.php")
        .then(response => response.json())  // Parse the response as JSON
        .then(data => {
            if (data.status === "error" && data.message === "not_logged_in") {
                // If not logged in, show the login modal
                var loginModal = new bootstrap.Modal(document.getElementById('loginRegisterModal'));
                loginModal.show();
            } else if (data.status === "error" && data.message === "file_not_found") {
                // If the file was not found, handle it
                alert("The file was not found.");
            } else if (data.status === "success" && data.message === "file_ready") {
                // File is ready, now proceed to download
                fetch("downloadBroucher.php")
                    .then(response => response.blob())  // Get the file as a Blob
                    .then(blob => {
                        const link = document.createElement('a');
                        link.href = URL.createObjectURL(blob);
                        link.download = 'broucher.pdf';  // Set the filename for the download
                        link.click();  // Trigger the download
                    })
                    .catch(error => console.error("Error:", error));  // Handle download error
            }
        })
        .catch(error => console.error("Error:", error)); // Handle JSON response error
});

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
               <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>
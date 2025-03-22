<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="navCss.css?v=2.0">
    </head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <!-- Logo and Brand Name -->
        <div class="navbar-brand d-flex align-items-center  wow animate__animated animate__pulse" data-wow-iteration="infinite">
            <img src="images/logo.png" alt="" width="62" height="64" class="d-inline-block align-text-center">
            <span class="glow">Rams Impex</span>
        </div>

        <!-- Toggler Button for Mobile View -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            <span class="cross-icon "><i class="fa-solid fa-xmark"></i></span>
        </button>

        <!-- Collapsible Content -->
        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
            <!-- Menu Section -->
                        <?php
            $currentPage = basename($_SERVER['PHP_SELF']);
            ?>

            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'index.php' ? 'active' : ''; ?>" href="index.php" ><i class="fa fa-fw fa-home"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'about.php' ? 'active' : ''; ?>" href="about.php" ><i class="fa fa-users"></i>About Us</a>
                </li>
                <!-- <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'infra.php' ? 'active' : ''; ?>" href="infra.php" ><i class="fa fa-industry"></i>Infrastructure</a>
                </li> -->
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'products.php' ? 'active' : ''; ?>" href="products.php" ><i class="fa fa-box"></i> Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo $currentPage == 'contact.php' ? 'active' : ''; ?>" href="contact.php" ><i class="fa fa-fw fa-envelope"></i>Contact Us</a>
                </li>
            </ul>

                

            <!-- Email Section -->
            <div class="ms-auto text-sm-end">
                <a class="nav-link" style="color: #6b0ea580 !important;  font-weight: bold; font-size:18px" href="mailto:rampsimpex@gmail.com"><i class="fa fa-envelope"></i>
                rampsimpex@gmail.com</a>
            </div>
        </div>
    </div>
</nav>


<script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              
              </script>
              
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>
<?php
include "session_check.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rams Impex</title>
    <link rel="icon" href="../images/logo.png" sizes="512x512" type="image/png">
    
    <!-- Bootstrap & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    <!-- Animations -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="nav_adminCss.css?v=2.0">
    
    <style>
        /* Ensure Body Uses Flex for Layout */
        body {
            display: flex;
            flex-direction: column;
            margin: 0;
            overflow-x: hidden;
        }

        /* Navbar */
        .navbar {
            z-index: 1050;
            width: 100%;
        }

        /* Sidebar */
        .sidenav {
            width: 250px;
            height: 100vh;
            background: #6b0ea5!important;
            position: fixed;
            top: 60px;
            left: 0;
            padding-top: 20px;
            transition: all 0.3s ease-in-out;
        }

        .sidenav a {
            display: block;
            padding: 15px 20px;
            color: white;
            text-decoration: none;
        }

        .sidenav a:hover {
            background: white;
            color: #6b0ea5!important;
        }

        /* Sidebar Collapsed */
        .sidenav.hide {
            left: -250px;
        }

        /* Sidebar Toggle Button */
        .toggle-btn {
            position: fixed;
            top: 100px;
            left: 180px;
            z-index: 1000;
            background: white
            color:  #6b0ea580;            ;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }

        .toggle-btn:hover {
            
            background: #6b0ea5!important;
        }

        /* Main Content */
        .main-content {
            margin-left: 250px;
            width: calc(100% - 250px);
            transition: margin-left 0.3s ease-in-out, width 0.3s ease-in-out;
        }

        /* When Sidebar is Collapsed */
        .sidenav.hide + .main-content {
            margin-left: 0;
            width: 100%;
        }

        /* Default iframe width */
        iframe {
            width: 100%;
            height: 100vh;
            min-height: calc(100vh - 60px);
            overflow: auto;
            transition: width 0.3s ease-in-out;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .sidenav {
                width: 100%;
                left: -100%;
            }

            .sidenav.show {
                left: 0;
            }

            .sidenav.hide + .main-content {
                width: 100%;
            }

            .toggle-btn {
                top: 70px;
                
            }
        }
    </style>
</head>
<body>

<?php include "nav_admin.php"; ?>

<!-- Sidebar Toggle Button -->
<button class="toggle-btn" id="toggleSidebar">
    <i class="bi bi-list"></i>
</button>

<!-- Sidebar -->
<div class="sidenav" id="sidenav">
    <a href="home.php" target="main-frame"><i class="bi bi-house-door"></i> Home</a>
    <a href="profile.php" target="main-frame"><i class="bi bi-person"></i> Profile</a>
    <a href="add_product.php" target="main-frame"><i class="bi bi-plus-square"></i> Add Products</a>
    <a href="view_product.php" target="main-frame"><i class="bi bi-card-list"></i> View/Disable Products</a>
    <a href="add_subproducts.php" target="main-frame"><i class="bi bi-folder-plus"></i> Add Subproducts</a>
    <a href="view_subproducts.php" target="main-frame"><i class="bi bi-folder-check"></i> View/Delete/Edit Subproducts</a>
    <a href="add_video.php" target="main-frame"><i class="bi bi-camera-reels"></i> Add Videos</a>
    <a href="detailsUser.php" target="main-frame"><i class="bi bi-file-earmark-text"></i> Request Details</a>
    <a href="details_edit_view.php" target="main-frame"><i class="bi bi-pencil-square"></i> Edit Details</a>
</div>

<!-- Main Content -->
<div class="main-content">
    <iframe name="main-frame" src="home.php"></iframe>
</div>

<!-- JavaScript -->
<script>
    document.getElementById("toggleSidebar").addEventListener("click", function () {
        let sidebar = document.getElementById("sidenav");
        let mainContent = document.querySelector(".main-content");

        sidebar.classList.toggle("hide");

        // Adjust main content width dynamically
        if (sidebar.classList.contains("hide")) {
            mainContent.style.marginLeft = "0";
            mainContent.style.width = "100%";
        } else {
            mainContent.style.marginLeft = "250px";
            mainContent.style.width = "calc(100% - 250px)";
        }
    });
</script>

<!-- Bootstrap & Animation Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script> new WOW().init(); </script>

</body>
</html>

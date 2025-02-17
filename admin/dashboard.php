<?php
include "session_check.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rams Impex</title>
    <link rel="icon" href="../images/logo1.jpeg" sizes="512x512" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link rel="stylesheet" href="nav_adminCss.css?v=2.0">

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .navbar-brand img {
            margin-right: 10px;
        }

        .sidebar {
            margin-top: 50px;
            width: 250px;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #6b0ea5;
            color: white;
            padding-top: 60px;
        }

        .sidebar a {
            color: white;
            padding: 15px;
            display: block;
            text-decoration: none;
        }

        .sidebar a:hover {
            background-color: #6b0ea580 !important;
        }

        .content {
            margin-left: 300px;
            padding: 0;
            flex-grow: 1;
        }

        iframe {
            width: 100%;
            height: calc(100vh - 60px);
            border: none;
        }
    </style>
</head>
<body>

<!-- Top Navbar -->
<?php include "nav_admin.php";?>

<!-- Sidebar -->
<div class="sidebar">
    <a href="home.php" target="main-frame"><i class="bi bi-house-door"></i> Home</a>
    <a href="add_product.php" target="main-frame"><i class="bi bi-plus-square"></i> Add Products</a>
    <a href="view_product.php" target="main-frame"><i class="bi bi-card-list"></i> View/Disable Products</a>
    <a href="add_subproducts.php" target="main-frame"><i class="bi bi-folder-plus"></i> Add Subproducts</a>
    <a href="view_subproducts.php" target="main-frame"><i class="bi bi-folder-check"></i> View/Delete/Edit Subproducts</a>
    <a href="add_video.php" target="main-frame"><i class="bi bi-camera-reels"></i> Add Videos</a>
    <a href="detailsUser.php" target="main-frame"><i class="bi bi-file-earmark-text"></i> Request Details</a>
    <a href="details_edit_view.php" target="main-frame"><i class="bi bi-pencil-square"></i> Edit Details</a>
</div>


<!-- Main Content -->
<div class="content">
<iframe name="main-frame" src=""></iframe>
</div>

<!-- JS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script>
    new WOW().init();
</script>

</body>
</html>

<!-- 404.php -->
<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <link rel="icon" href="images/logo1.jpeg" sizes="512x512" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Lilita+One&display=swap">
    <style>
        body {
            text-align: center;
            margin-top: 100px;
        }

        .navbar-brand {
            font-family: 'Lilita One', cursive;
            font-weight: bold;
            letter-spacing: 1px;
            text-transform: capitalize;
            word-spacing: -1px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .glow {
            
            font-size: 32px;
            color: #6b0ea5;
            text-align: center;
            animation: glow 2s ease-in-out infinite alternate; 
        }

        @-webkit-keyframes glow {
            from {
                text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #6b0ea5, 0 0 40px #6b0ea580, 0 0 50px #6b0ea580, 0 0 60px #6b0ea5, 0 0 70px #6b0ea5;
            }
            to {
                text-shadow: 0 0 20px #fff, 0 0 30px #6b0ea580, 0 0 40px #6b0ea580, 0 0 50px #6b0ea580, #6b0ea580 #6b0ea5, 0 0 70px #6b0ea5, 0 0 80px #6b0ea5;
            }
        }

        .container {
            width: 80%;
            max-width: 600px;
            padding: 35px;
            border: 2px solid #6b0ea5;
            box-shadow: 0 0 10px #6b0ea5;
            border-radius: 10px;
        }

        .btn-primary {
            background-color: #6b0ea5;
            border-color: #6b0ea5;
        }

        .btn-primary:hover {
            background-color: #520c84;
            border-color: #520c84;
        }
    </style>
</head>
<body>

    <div class="container">
        <!-- Logo Section -->
        <div class="navbar-brand d-flex align-items-center justify-content-center text-nowrap">
    <img src="images/logo.png" alt="Rams Impex Logo" class="img-fluid me-2" style="max-width: 50px; height: auto;">
    <span class="glow">Rams Impex</span>
</div>

<br><br><br><br>

        <!-- 404 Message -->
        <h1 class="text-danger">404 - Page Not Found</h1>
        <p class="lead">Oops! The page you're looking for doesn't exist.</p>
        <a href="index.php" class="btn btn-primary"><i class="fa fa-home"></i> Go Back to Home</a>

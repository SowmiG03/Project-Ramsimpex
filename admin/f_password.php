<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="nav_adminCss.css?v=2.0">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <title>Forgot Password</title>
    <meta charset="UTF-8">
   </head>
   <style>
        body {
            background-image: url('images/fp1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            font-family: "Sitka Text Semibold" !important;
        }
        
        .navbar-custom {
            background-color: #6a0dad;
        }

        .navbar-custom a {
            color: white;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        h1 {
            color: #6a0dad; /* Purple heading */
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px !important;
        }

        form {
            background: #d3d3d3; /* Gray form background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 100%;
            max-width: 400px;
            text-align: center;
            font-family: Sitka Text Semibold;
            font-weight: bold;
            margin-top: 8%;
            margin-left: 35%;

        }

        label {
            display: block;
            font-size: 14px;
            color: #6a0dad; /* Purple label */
            margin-bottom: 8px;
            text-align: left !important;
        }

        input[type="email"] {
            width: 90%; /* Full-width input */
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 30px;
            background-color: #f9f9f9; /* Light gray input background */
            margin-bottom: 15px;
        }

        input[type="email"]:focus {
            border-color: #6a0dad; /* Purple border on focus */
            outline: none;
            box-shadow: 0 0 5px rgba(106, 13, 173, 0.5); /* Purple glow */
        }

        button {
            width: 95%; /* Full-width button */
            padding: 10px;
            font-size: 16px;
            color: #ffffff; /* White text */
            background-color: #6a0dad; /* Purple button */
            border: none;
            border-radius: 30px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #5c089b; /* Darker purple on hover */
        }
    </style>
</head>
<body>



<?php include "nav_admin.php"?>
    <!-- Alert Message -->
    <?php if (isset($_GET['message']) && $_GET['message'] === 'sent'): ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Message sent! Please check your inbox.
        </div>
    <?php elseif (isset($_GET['message']) && $_GET['message'] === 'error'): ?>
        <div class="alert alert-danger alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            Failed to send message. Please try again.
        </div>
    <?php endif; ?>

   
    <div>
        
        <form method="post" action="send-password-reset.php">
        <h1>Forgot Password</h1>
       
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
            <button type="submit">Send</button>
        </form>
    </div>
</body>
</html>
<?php
include "database.php";
// Initialize variables for messages
$message = "";
$messageType = ""; // success or error

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    $confirmPassword = htmlspecialchars(trim($_POST['confirmPassword']));

    // Validate name (only alphabets and spaces)
    if (!preg_match("/^[a-zA-Z\s]+$/", $name)) {
        $message = "Name must contain only letters and spaces!";
        $messageType = "error";
    }
    // Validate email format
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $message = "Invalid email format!";
        $messageType = "error";
    }
    // Validate password strength
    elseif (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $password)) {
        $message = "Password must be at least 8 characters long, contain at least one number, and one special character.";
        $messageType = "error";
    }
    // Check if passwords match
    elseif ($password !== $confirmPassword) {
        $message = "Passwords do not match!";
        $messageType = "error";
    } else {
        // Hash the password
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert into database
        $sql = "INSERT INTO admin_login (name, email, password) VALUES (?, ?, ?)";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("sss", $name, $email, $hashedPassword);

        if ($stmt->execute()) {
            echo "<script>
            alert('Registration successful!');
            window.location.href = 'adminlogin.php';
        </script>";
        exit();
        } else {
            $message = "Error: " . $stmt->error;
            $messageType = "error";
        }

        $stmt->close();
    }
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    
    <link rel="icon" href="../images/logo1.jpeg" sizes="512x512" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="nav_adminCss.css?v=2.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
         body {
            background-image: url('images/ar4.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            font-family: "Sitka Text Semibold" !important;
        }
        
    

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .registration-form {
            background: #d3d3d3; /* Light gray form background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 100%;
            max-width: 400px;
            font-family: Sitka Text Semibold;
            margin-top: 5%;
            margin-left: 35%;
        }

        .registration-form h2 {
            margin-bottom: 20px;
            font-size: 24px;
            color: #6a0dad; /* Purple heading */
            text-align: center;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            color: #6a0dad; /* Purple label */
        }

        .form-group input {
            width: 90%; /* Full width for input fields */
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 30px;
            background-color: #f9f9f9; /* Slightly gray input background */
        }

        .form-group input:focus {
            border-color: #6a0dad; /* Purple border on focus */
            outline: none;
            box-shadow: 0 0 5px rgba(106, 13, 173, 0.5); /* Subtle purple glow */
        }

        .submit-btn {
            width: 95%; /* Full width for button */
            padding: 10px;
            font-size: 16px;
            color: #ffffff; /* White text */
            background-color: #6a0dad; /* Purple button */
            border: none;
            border-radius: 30px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background-color: #5c089b; /* Darker purple on hover */
        }
    </style>
</head>
<body>
    
<?php include "nav_admin.php"?>
    
   
<?php if ($message): ?>
    <script>
        alert("<?php echo $messageType === 'success' ? 'Success: ' : 'Error: '; ?><?php echo $message; ?>");
    </script>
<?php endif; ?>

<form class="registration-form" id="registrationForm" method="POST" action="">
    <h2>SIGN UP</h2>
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
    </div>
    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" id="confirmPassword" name="confirmPassword" required>
    </div>
    <button type="submit" class="submit-btn">Sign Up</button>
</form>

<script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
</body>
</html>

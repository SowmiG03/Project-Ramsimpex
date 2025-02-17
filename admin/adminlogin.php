<?php
// Start session and include database connection
session_start();
include "database.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin_login WHERE email = ?";
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['logged_in'] = true;
            header("Location: dashboard.php");
            exit;
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}
?>
<?php
if (isset($_GET['message']) && $_GET['message'] === 'logout_success') {
    echo '
    <script>
        alert("Logout Successful!");
        window.location.href = "adminlogin.php";
    </script>
    ';
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    
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
            background-image: url('images/rp1.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height: 100vh;
            font-family: "Sitka Text Semibold" !important;
        }
        
        
        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h2 {
            color: #6a0dad;
            font-weight: bold;
        }

        .form-label {
            color: #6a0dad;
            font-weight: bold;
        }

        .form-control {
            border-radius: 30px;
            border: 1px solid #dcdcdc!important;
        }

        .form-control:focus {
            outline: none;
            border: 1px solid #6a0dad;
            box-shadow: 0 0 5px #6a0dad;
        }

        .btn {
            background-color: #6a0dad !important;
            border-radius: 30px !important;
            padding: 10px;
            width: 100%;
            font-weight: bold;
            border: 1px solid #6a0dad !important; /* Purple border on focus */
            color: #dcdcdc !important;
        }

        .btn:hover {
            background-color:rgb(167, 90, 226)!important;
            color: #dcdcdc !important;
        }
        
        .actions {
            display: flex;
            justify-content: space-between;
            margin-top: 15px;
            font-size: 14px;
        }

        a {
            text-decoration: none;
        
        }

        

        .text-danger {
            font-size: 14px;
            margin-top: 10px;
        }


      
.mb-3 .form-control{
    border-radius: 30px;

}

.form-control:focus{
    outline: none;
            border: 1px solid #6a0dad !important; /* Purple border on focus */
            box-shadow: 0 0 5px #6a0dad !important;
 
}

.cus :hover{
    color: #6a0dad !important;
}


    </style>
</head>
<body>
    <!-- Navbar -->
    <?php include "nav_admin.php";?>
  
    
    <!-- Login Form -->
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="card p-4 shadow-lg" style="width: 400px;">
            <h2 class="text-center mb-4">Login</h2>

            <!-- Login Form Start -->
            <form method="POST" class="mb-2">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn w-10" >Login</button>
         
            </form>
            <!-- Login Form End -->

            <div class="d-flex justify-content-between mt-3 cus">
                <a href="f_password.php" class="text-decoration-none text-muted">Forgot Password?</a>
                <a href="adminreg.php" class="text-decoration-none text-muted">Sign Up</a>
            </div>

            <?php if (isset($error)): ?>
                <p class="text-danger mt-3 text-center"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
    </div>

    <script src="js/wow.min.js"></script>
              <script>
              new WOW().init();
              </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
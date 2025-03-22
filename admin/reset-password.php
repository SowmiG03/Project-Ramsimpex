<?php

$token = $_GET["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM admin_login
        WHERE reset_token = ?";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("s", $token_hash);

$stmt->execute();

$result = $stmt->get_result();

$user = $result->fetch_assoc();

if ($user === null) {
    die("token not found");
}

if (strtotime($user["reset_expires"]) <= time()) {
    die("token has expired");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav_adminCss.css?v=2.0">
      <!-- Include Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-image: url('images/al3.jpg');
            background-size: cover;
            background-repeat:no-repeat;
            height: 100vh;
            font-family: "Sitka Text Semibold";
        }


        .card {
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        h1 {
            color: #6a0dad; /* Purple heading */
            text-align: center;
            margin-bottom: 20px;
            font-size: 28px !important;
            font-weight: bold;
        }

        form {
            background: #d3d3d3; /* Gray form background */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            width: 100%;
            max-width: 400px;
            margin: 7% auto;
            font-family: "Sitka Text Semibold";
            font-weight: bold;
            
        }

        label {
            font-size: 14px;
            color: #6a0dad; /* Purple label */
            margin-bottom: 8px;
            text-align: left;
            display: block;
        }

        input[type="password"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 30px;
            background-color: #f9f9f9; /* Light gray input background */
            margin-bottom: 15px;
        }

        input[type="password"]:focus {
            border-color: #6a0dad; /* Purple border on focus */
            outline: none;
            box-shadow: 0 0 5px rgba(106, 13, 173, 0.5); /* Purple glow */
        }

        button {
            width: 100%; /* Full-width button */
            padding: 10px;
            font-size: 16px;
            color: #ffffff; /* White text */
            background-color: #6a0dad; /* Purple button */
            border: none;
            border-radius: 30px !important;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #5c089b; /* Darker purple on hover */
        }

        .error {
            color: red;
            font-size: 12px;
            margin-top: -10px;
            margin-bottom: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <?php include "nav_admin.php"; ?>

    <div>
        <form id="resetPasswordForm" method="post" action="process-reset-password.php">
            <h1>RESET PASSWORD</h1>

            <input type="hidden" name="token" value="<?= htmlspecialchars($token) ?>">

            <label for="password">New Password</label>
            <input type="password" id="password" name="password" required>
            <div id="passwordError" class="error"></div>

            <label for="password_confirmation">Repeat Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
            <div id="passwordConfirmationError" class="error"></div>

            <button type="submit">Send</button>
        </form>
    </div>

    <script>
        document.getElementById('resetPasswordForm').addEventListener('submit', function (event) {
            const password = document.getElementById('password').value;
            const passwordConfirmation = document.getElementById('password_confirmation').value;

            // Password validation regex
            const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

            let isValid = true;

            // Validate password
            if (!passwordRegex.test(password)) {
                document.getElementById('passwordError').innerText =
                    'Password must be at least 8 characters long, contain letters, digits, and special characters.';
                isValid = false;
            } else {
                document.getElementById('passwordError').innerText = '';
            }

            // Validate password confirmation
            if (password !== passwordConfirmation) {
                document.getElementById('passwordConfirmationError').innerText =
                    'Passwords do not match.';
                isValid = false;
            } else {
                document.getElementById('passwordConfirmationError').innerText = '';
            }

            // If validation fails, prevent form submission
            if (!isValid) {
                event.preventDefault();
            }
        });
    </script>
</body>
</html>

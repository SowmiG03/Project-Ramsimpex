<?php

$token = $_POST["token"];

$token_hash = hash("sha256", $token);

$mysqli = require __DIR__ . "/database.php";

$sql = "SELECT * FROM admin_login WHERE reset_token = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("Token not found");
}

if (strtotime($user["reset_expires"]) <= time()) {
    die("Token has expired");
}

// Validate password
if (strlen($_POST["password"]) < 8) {
    die("Password must be at least 8 characters");
}

if (!preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if (!preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");
}

if ($_POST["password"] !== $_POST["password_confirmation"]) {
    die("Passwords must match");
}

// Hash and update password
$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$sql = "UPDATE admin_login SET password = ?, reset_token = NULL, reset_expires = NULL WHERE id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $password_hash, $user["id"]);

if ($stmt->execute()) {
    // Success message in a modal with redirection
    echo '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Password Updated</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css">
        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Modal -->
        <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="successModalLabel">Password Updated</h4>
                    </div>
                    <div class="modal-body">
                        Your password has been updated successfully. Redirecting to the login page...
                    </div>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function(){
                $("#successModal").modal("show");
                setTimeout(function(){
                    window.location.href = "adminlogin.php";
                }, 3000);
            });
        </script>
    </body>
    </html>
    ';
} else {
    echo "Error updating password. Please try again.";
}
?>

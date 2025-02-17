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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body class="text-center" style="margin-top: 100px;">

    <div class="container">
        <h1 class="text-danger">404 - Page Not Found</h1>
        <p class="lead">Oops! The page you're looking for doesn't exist.</p>
        <a href="index.php" class="btn btn-primary">Go Back to Home</a>
    </div>

</body>
</html>

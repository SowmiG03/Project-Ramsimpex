<?php
include "session_check.php";

include 'database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['addVideo'])) {
    $title = $_POST['title'];
    $url = $_POST['url'];

    $stmt = $mysqli->prepare("INSERT INTO videoes (title, url) VALUES (?, ?)");
    if ($stmt) {
        $stmt->bind_param("ss", $title, $url);
        $stmt->execute();
        $stmt->close();

        // Display success message using JavaScript
        echo "<script>
                alert('Video inserted successfully!');
                window.location.href = 'index.php';
              </script>";
        exit();
    } else {
        echo "<script>
                alert('Error: " . $mysqli->error . "');
                window.location.href = 'add_video.php';
              </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Video</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa; /* Light gray background */
            font-family: Cascadia Code !important;
        }

        .form-container {
            background-color:rgb(233, 235, 238);
            border-radius: 8px;
            padding: 30px;
            max-width: 500px;
            margin: 50px auto;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #6b0ea5; /* Purple */
            text-align: center;
        }

        label {
            color: #6b0ea5; /* Purple */
              }

        .btn-purple {
            background-color: #6b0ea5;
            color: white;
            border: none;
            border-radius: 30px;
            width: 50%;
            padding: 10px;
        }

        .btn-purple:hover {
            background-color: #6b0ea5;
        }

        .form-control {
            border-radius: 30px;
        }

        .form-control:focus {
            border: 1px solid #6b0ea5;
            box-shadow: 0 0 5px #6b0ea5;
        }

        .submit-container {
            display: flex;
            justify-content: center !important;
        }

    </style>
</head>
<body>

    <div class="container">
        <div class="form-container">
            <h2>ADD VIDEOS</h2>
            <form method="POST" action="add_video.php">
                <div class="mb-3">
                    <label for="title" class="form-label">Title:</label>
                    <input type="text" name="title" class="form-control" id="title" required>
                </div>

                <div class="mb-3">
                    <label for="url" class="form-label">Video URL (Embed Link):</label>
                    <input type="text" name="url" class="form-control" id="url" required>
                </div>
<div class="submit-container">
                <button type="submit" name="addVideo" class="btn btn-purple">Add Video</button>
</div>
            </form>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

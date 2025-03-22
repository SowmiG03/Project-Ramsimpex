<?php
session_start();
require_once("database.php"); // Ensure database connection is correct

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    die("User not logged in.");
}

$user_id = $_SESSION['user_id'];

// Fetch user details from `admin_login` table
$query = "SELECT * FROM admin_login WHERE id = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if (!$user) {
    die("User ID " . $user_id . " not found in the database.");
}

// Initialize user fields
$id = $user['id'];
$name = $user['name'] ?? '';
$email = $user['email'] ?? '';
$phone = $user['phone'] ?? '';
$photo = $user['photo'] ?? 'default.png'; // Use default image if no profile picture

// Fetch profile details from `profile` table
$profileQuery = "SELECT * FROM profile WHERE admin_id = ?";
$stmt = $mysqli->prepare($profileQuery);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$profileResult = $stmt->get_result();
$profile = $profileResult->fetch_assoc();

if ($profile) {
    $name = $profile['name'] ?? $name;
    $phone = $profile['phone'] ?? $phone;
    $photo = $profile['photo'] ?? $photo;
}

// Handle Profile Update
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $phone = $_POST['phone'];

    // Handle password update if provided
    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $updatePasswordQuery = "UPDATE admin_login SET password = ? WHERE id = ?";
        $stmt = $mysqli->prepare($updatePasswordQuery);
        $stmt->bind_param("si", $password, $id);
        $stmt->execute();
    }

    // Handle file upload for profile picture
    if (!empty($_FILES['photo']['name'])) {
        $target_dir = "uploads/";
        $original_file_name = basename($_FILES["photo"]["name"]);
        $file_extension = strtolower(pathinfo($original_file_name, PATHINFO_EXTENSION));

        // Validate file type
        $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($file_extension, $allowed_extensions)) {
            die("<script>alert('Invalid file type. Only JPG, JPEG, PNG, and GIF are allowed.');</script>");
        }

        // Rename file to avoid overwriting
        $photo = "profile_" . time() . "." . $file_extension;
        $target_file = $target_dir . $photo;

        // Move uploaded file
        if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
            // Update photo in the database
            $updatePhotoQuery = "UPDATE profile SET photo = ? WHERE admin_id = ?";
            $stmt = $mysqli->prepare($updatePhotoQuery);
            $stmt->bind_param("si", $photo, $id);
            $stmt->execute();
        } else {
            echo "<script>alert('Error uploading file!');</script>";
        }
    }

    // Update or Insert Profile
    $insertQuery = "INSERT INTO profile (admin_id, name, phone, photo) 
                    VALUES (?, ?, ?, ?) 
                    ON DUPLICATE KEY UPDATE name = VALUES(name), phone = VALUES(phone), photo = VALUES(photo)";

    $stmt = $mysqli->prepare($insertQuery);
    $stmt->bind_param("isss", $id, $name, $phone, $photo);

    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully!'); window.location='profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom CSS -->
    <style>
        body {
            /* background-color: #f3e5f5; Light purple background */
            font-family: Cascadia Code;
           
}
        .profile-container {
            max-width: 500px;
            margin: 50px auto;
            background-color:rgb(233, 235, 238);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }
        /* .profile-container {
            max-width: 500px;
            margin: 50px auto;
            background:transparent;
            padding: 30px;
            background-color:rgb(233, 235, 238);
            
           
            
        } */



        h2 {
            color: #6a1b9a; /* Dark purple */
            text-align: center;
        }
        label {
            font-weight: bold;
            color: #6a1b9a;
        }
        .form-control {
            border-radius: 5px;
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
        
        .profile-img {
            display: block;
            margin: 10px auto;
            border-radius: 50%;
            width: 120px;
            height: 120px;
            object-fit: cover;
            border: 4px solid #6a1b9a;
        }


        .mb-3 .form-control{
    border-radius: 30px;

}

.form-control:focus{
    outline: none;
            border: 1px solid #6a0dad !important; /* Purple border on focus */
            box-shadow: 0 0 5px #6a0dad !important;
 
}

    </style>
</head>
<body>

<div class="container">
    <div class="profile-container">
        <h2>USER PROFILE</h2>


        <div class="mb-3 text-center">
               
                <?php 
                    $profile_img = "uploads/" . htmlspecialchars($photo);
                    if (!file_exists($profile_img) || empty($photo)) {
                        $profile_img = "uploads/default.png"; // Default Image
                    }
                ?>
                <img src="<?php echo $profile_img; ?>" class="profile-img" alt="Profile Picture">
                
                
                
                
             
            </div>



        <form action="" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">

            <div class="mb-3">
                <label class="form-label">Name:</label>
                <input type="text" name="name" class="form-control" value="<?php echo htmlspecialchars($name); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="<?php echo htmlspecialchars($email); ?>" readonly>
            </div>

            <div class="mb-3">
                <label class="form-label">New Password (Leave blank to keep current password):</label>
                <input type="password" name="password" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Phone:</label>
                <input type="text" name="phone" class="form-control" value="<?php echo htmlspecialchars($phone); ?>" required>
            </div>

            <div class="mb-3">
            <label class="form-label">Profile Picture:</label><br>
            <input type="file" name="photo" class="form-control mt-2">
            </div>

            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

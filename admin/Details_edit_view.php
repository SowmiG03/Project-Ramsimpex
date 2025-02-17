<?php
include "session_check.php";
include('database.php');

// Fetch all the contact details
$query = "SELECT * FROM details";
$result = mysqli_query($mysqli, $query);

// Handle editing and updating records
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
    $id = $_POST['id'];
    $info_content = $_POST['info_content'];

    // Update the contact information in the database
    $updateQuery = "UPDATE details SET info_content = '$info_content' WHERE id = '$id'";

    if (mysqli_query($mysqli, $updateQuery)) {
        // Success: Display success alert
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Update Successful!</strong> Your record has been updated successfully.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close""></button>
              </div>';
    } else {
        // Error: Display error alert
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Error updating record: ' . mysqli_error($mysqli) . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close""></button>
              </div>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Contact Details Management</title>
    <!-- Add Bootstrap 5 CSS for styling -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2>Manage Contact Details</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Content</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    
                                    <td>
                        <span style="font-weight: bold; text-transform: uppercase;">
                            <?php echo $row['info_type']; ?>
                        </span><br>
                        <?php echo $row['info_content']; ?>
                    </td>
                    <td>
                        <!-- Edit button -->
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModal<?php echo $row['id']; ?>">Edit</button>
                    </td>
                </tr>

                <!-- Modal for Editing -->
                <div class="modal fade" id="editModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editModalLabel">Edit Contact Detail</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="">
                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                    <div class="form-group">
                                        <label for="info_content">Content</label>
                                        <input type="text" class="form-control" id="info_content" name="info_content" value="<?php echo $row['info_content']; ?>" required>
                                    </div><br>
                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- jQuery and Bootstrap 5 JS (Bundle with Popper) for the modal to function -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

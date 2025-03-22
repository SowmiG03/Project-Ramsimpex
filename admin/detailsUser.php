<?php
include "session_check.php";
include "database.php";

$limit = 8; 

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($page < 1) $page = 1; // Ensure page number is at least 1

$offset = ($page - 1) * $limit;

// Get the total number of records
$totalQuery = "SELECT COUNT(*) as total FROM contact_form";
$totalResult = $mysqli->query($totalQuery);
$totalRow = $totalResult->fetch_assoc();
$totalRecords = $totalRow['total'];

// Calculate total pages
$totalPages = ceil($totalRecords / $limit);

// Fetch records for the current page
$sql = "SELECT * FROM contact_form LIMIT $limit OFFSET $offset";
$result = $mysqli->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            color: #6b0ea5;
            font-family: Cascadia Code !important;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        h2 {
            color: #6b0ea5;
        }
        .table thead {
            background-color: #6b0ea5;
            color: white;
        }
        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #f3e5f5;
        }
        .table-striped tbody tr:nth-of-type(even) {
            background-color: #ede7f6;
        }
        .btn-primary {
            background-color: #6b0ea5;
            border-color: #6b0ea5;
        }
        .btn-primary:hover {
            background-color: #6b0ea5;
            border-color: #6b0ea5;
        }
    </style>
</head>
<body>

<div class="container my-5">
    <h2 class="text-center mb-4">CONTACT DETAILS</h2>

    <?php if ($result->num_rows > 0): ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>SI.NO</th>
                    <th>NAME<br>PHONE NUMBER<br>COUNTRY</th>
                    <th>EMAIL<br>MESSAGE</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $serial = $offset + 1; // Serial number for each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $serial++ . "</td>"; // Increment serial number
                    echo "<td>" . $row['name'] ."<br>". $row['phone_number']."<br>". $row['country']. "</td>";
                    echo "<td>" . $row['email']."<br>". $row['message'] . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>

        <!-- Pagination -->
        <nav aria-label="Page navigation">
            <ul class="pagination justify-content-center">
                <?php if ($page > 1): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo; Previous</span>
                        </a>
                    </li>
                <?php endif; ?>

                <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item <?= ($i == $page) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                <?php endfor; ?>

                <?php if ($page < $totalPages): ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">Next &raquo;</span>
                        </a>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        
    <?php else: ?>
        <p class="text-center">No contacts found</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
$mysqli->close();
?>

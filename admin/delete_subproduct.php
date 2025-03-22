<?php
include "session_check.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Subproduct</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this subproduct?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
        <button type="button" class="btn btn-danger" id="confirmDelete">Yes</button>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function () {
    $('#deleteModal').modal('show');

    $('#confirmDelete').click(function () {
        const subproductId = '<?php echo isset($_GET['subproduct_id']) ? $_GET['subproduct_id'] : ''; ?>';

        if (!subproductId) {
            alert('Error: Subproduct ID not found.');
            return;
        }

        $.ajax({
            url: 'delete_subproduct.php',
            type: 'GET',
            data: { subproduct_id: subproductId },
            success: function (response) {
                alert('Server Response: ' + response);
                $('#deleteModal').modal('hide');
                // Optionally refresh data without reloading the page
            },
            error: function (xhr, status, error) {
                console.error('AJAX Error:', status, error);
                alert('Failed to delete subproduct. Check the console for more details.');
            }
        });
    });
});
</script>

</body>
</html>

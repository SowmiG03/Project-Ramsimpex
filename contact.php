<?php
include("functions.php");
// Fetch details using your function
$details = getDetails();

$message = isset($_GET['message']) ? $_GET['message'] : '';
$message_type = isset($_GET['message_type']) ? $_GET['message_type'] : '';

// Determine the alert class based on message type
$alert_class = ($message_type == 'success') ? 'alert-success' : 'alert-danger';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="icon" href="images/logo.png" sizes="512x512" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">


    <!-- for search and country API -->
     
<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <style>



.container{
    font-family:  Cascadia Code !important;
}


 .icon-round-medium {
    background-color: blue; /* Extra dark gray */
    width: 50px;
    height: 50px;
    border-radius: 50%; /* Makes it circular */
    position: relative; /* Allows inner elements to position relative to this */
    display: flex; /* Centers the icon */
    justify-content: center;
    align-items: center;
}
.form-color{
    background-color:rgb(233, 226, 239); 
    color: #6b0ea5;
    padding: 2rem; /* Add padding to ensure space around the form */
   

}
.inner-blue-circle {
    background-color: #6b0ea5; /* Blue inner circle */
    width: 60px; /* Slightly smaller than the parent */
    height: 60px;
    border-radius: 50%; /* Makes it circular */
    position: absolute; /* Positioned relative to parent */
    z-index: 1; /* Layer below the icon */
}

.fas.fa-comments,.fa.fa-map-marker  {
    position: relative; /* Positioned above the inner blue circle */
    z-index: 2; /* Layer above the blue circle */
    font-size: 20px; /* Adjust icon size */
    color: white; /* Icon color to white */
}

.block-container {
    background-image: url('images/logo1.jpeg');
    background-repeat: no-repeat;
    background-size: cover;
    margin: 0;
    padding: 0;
    width: 100%;
      height: 100vh;
      min-height: 300px;
      overflow: hidden; /* Hide any overflow */
  }
  .form-select:focus,.form-control,.input-group-text,button {
  border-radius: 0 !important;
}
.btn{
    background-color: #6b0ea5 !important;
            color: white !important;
            border: none;
            border-radius: 30px !important;
            width: 50% !important;
           
}
.btn:hover{
    background-color:rgb(173, 168, 176) !important;
    color: #6b0ea5 !important;
           
}


.col-12{
    font-family: Sitka Small Semibold;
}

.icon{
    color: #6b0ea5;
}

.form-select:focus,.form-control:focus {
            border: 1px solid #6b0ea5 !important;
            box-shadow: 0 0 5px #6b0ea5 !important;
        }


    </style>
</head>
<body>

<?php  include "navbar.php"; ?>
<div class="container-fluid p-0 m-0">
<div class="icon">
<?php

// Initialize arrays to store the specific categories
$emailAndTel= [];
$address = [];
$FaxAndHandy = [];

// Loop through the fetched details and organize them based on titles
foreach ($details as $row) {
    if ($row['title'] == 'Email and Tel') {
        $emailAndTel[$row['info_type']] = $row['info_content'];
    } elseif ($row['title'] == 'Address') {
        $address[] = $row['info_content'];
    } elseif ($row['title'] == 'Fax and Handy') {
        $FaxAndHandy[$row['info_type']] = $row['info_content'];
    }
}
?>

<div class="row">
    <!-- HEAD OFFICE & SUPPORT -->
    <div class="col-12 col-lg-4 col-md-6 text-center my-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
        <div class="d-inline-block margin-20px-bottom">
            <div class="bg-extra-dark-gray icon-round-medium">
                <div class="inner-blue-circle"></div>
                <span class="fas fa-comments text-light"></span>
            </div>
        </div>
        <div class="text-uppercase py-2">EMAIL  &amp; Telephone </div>
        <a class="text-decoration-none text-dark" href="mailto:<?php echo $emailAndTel['email']; ?>"><?php echo $emailAndTel['email']; ?></a><br>
        <a class="text-decoration-none text-dark" href="callto:<?php echo $emailAndTel['Tel']; ?>"><?php echo $emailAndTel['Tel']; ?></a>
    </div>

    <!-- SHOW ROOM & HEAD OFFICE -->
    <div class="col-12 col-lg-4 col-md-6 text-center my-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
        <div class="d-inline-block margin-20px-bottom">
            <div class="bg-extra-dark-gray icon-round-medium">
                <div class="inner-blue-circle"></div>
                <span class="fa fa-map-marker text-light"></span>
            </div>
        </div>
        <div class="text-uppercase py-2">ADDRESS</div>
        <div class="text-dark">
            <?php echo implode("<br>", $address); ?>
        </div>
    </div>

    <!-- FACTORY -->
    <div class="col-12 col-lg-4 col-md-6 text-center my-5 wow animate__animated animate__fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
        <div class="d-inline-block margin-20px-bottom">
            <div class="bg-extra-dark-gray icon-round-medium">
                <div class="inner-blue-circle"></div>
                <span class="fa fa-map-marker text-light"></span>
            </div>
        </div>
        <div class="text-uppercase py-2">FAX &amp; HANDY</div>
        <div class="text-dark">
            <?php echo implode("<br>", $FaxAndHandy); ?>
        </div>
    </div>
</div>

<!-- stop -->



<!-- stop -->

<div class="row">
    <div class="block-container col-12 col-md-6 ">
    </div>



    <?php if (!empty($message)): ?>
<!-- Bootstrap Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header <?php echo ($message_type == 'success') ? 'bg-success text-white' : 'bg-danger text-white'; ?>">
                <h5 class="modal-title" id="alertModalLabel">Notice</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php echo htmlspecialchars($message); ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalBtn">OK</button>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript to Show Modal & Remove Query Params -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var alertModal = new bootstrap.Modal(document.getElementById("alertModal"));
        alertModal.show();

        // Remove query parameters from the URL after showing the modal
        if (window.history.replaceState) {
            const newUrl = window.location.origin + window.location.pathname;
            window.history.replaceState(null, null, newUrl);
        }

        // Refresh the page when modal is closed
        document.getElementById("closeModalBtn").addEventListener("click", function () {
            location.reload();
        });
    });
</script>
<?php endif; ?>




    <div class="col-12 pt-5 col-md-6 form-color">
        
        <div class="h6 text-uppercase text-center">Fill out the form and we'll be in touch soon!</div>
        <div class="h2 text-uppercase text-center">Ready to request a quote?</div>
    <form method="post" action="contact_insert.php" class="row g-3 p-5" onsubmit="return validateForm()">
  <div class="col-md-6">
  <div class="input-group ">
    <input type="text" class="form-control" id="name" name="name" placeholder="Name*">
    </div>   </div>
  <div class="col-md-6">
  <div class="input-group">
    <input type="email" class="form-control" id="email" name="email" placeholder="Email*">
    </div>   </div>
  <div class="col-md-6">
  <div class="input-group ">
    <input type="tel" class="form-control" id="phone_number" name="phone_number" placeholder="Phone Number*">
    </div>   </div>
  <div class="col-md-6">
  <div class="input-group">
    <select class="form-select" aria-label="select country"  id="countrySelect" name="country">
      <option value="">Select Country</option>
    </select>
  </div> 
</div>
  <div class="col-md-12">
  <div class="input-group">
  <span class="input-group-text">Message</span>
  <textarea class="form-control" name="message"  rows="3" aria-label="With textarea"></textarea>
</div>  </div>

  <div class="col-12 text-center mt-4">
    <button type="submit" name="send" class="btn">Send Message</button>
  </div>
   
</form>
    
    </div>
</div>
</div>
<div class="row">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1558.5517756148033!2d78.07524396982092!3d10.962618655824475!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3baa2f51333ce891%3A0x138b08c78bd151fb!2s16%2C%20Ramkrishnapuram%2C%20Karur%2C%20Tamil%20Nadu%20639007!5e0!3m2!1sen!2sin!4v1737609332333!5m2!1sen!2sin" width="600" height="600" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></div> 
</div> 
 
<?php  include "footer.php"; ?>
<script>
     new WOW().init();
   
  $(document).ready(function () {
    fetch("https://restcountries.com/v3.1/all")
      .then(response => response.json())
      .then(data => {
        let countrySelect = $("#countrySelect");

        // Sort countries alphabetically
        data.sort((a, b) => a.name.common.localeCompare(b.name.common));

        // Populate select options with flag and name
        data.forEach(country => {
          let countryName = country.name.common;
          let flagUrl = country.flags.svg; // Get flag image URL

          let option = new Option(countryName, countryName);
          $(option).attr("data-flag", flagUrl); // Store flag URL in a data attribute
          countrySelect.append(option);
        });

        // Initialize Select2 with flag rendering
        $("#countrySelect").select2({
          placeholder: "Select a Country",
          allowClear:true,
          templateResult: formatCountry, // Format dropdown options
          templateSelection: formatCountry // Format selected option
        });

        // Function to format dropdown items with flags
        function formatCountry(state) {
          if (!state.id) return state.text; // Default text if no country selected
          
          let flagUrl = $(state.element).data("flag"); // Get flag URL
          return $(`<span><img src="${flagUrl}" width="20px" style="margin-right: 10px;"> ${state.text}</span>`);
        }
      })
      .catch(error => console.error("Error fetching countries:", error));
  });

  function validateForm() {
    // Get form elements
    var name = document.getElementById("name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone_number").value;
    var country = document.getElementById("countrySelect").value;
    var message = document.getElementsByName("message")[0].value;

    // Validate Name (must not be empty)
    if (name == "") {
      alert("Please enter your name.");
      return false;
    }

    // Validate Email with regular expression using preg_match equivalent in JS
    var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (email == "" || !emailPattern.test(email)) {
      alert("Please enter a valid email address.");
      return false;
    }

    // Validate Phone Number (must be numbers only, and not empty)
    var phonePattern = /^[0-9]{10}$/; // Assuming a 10-digit phone number format
    if (phone == "" || !phonePattern.test(phone)) {
      alert("Please enter a valid 10-digit phone number.");
      return false;
    }

    // Validate Country (must be selected)
    if (country == "") {
      alert("Please select your country.");
      return false;
    }

    // Validate Message (must not be empty)
    if (message == "") {
      alert("Please enter your message.");
      return false;
    }

    return true; // Allow form submission if all fields are valid
  }


</script>


<!-- Bootstrap JS Bundle (includes Popper.js) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>


</body>
</html>

<?php
session_start();
  if (!isset($_SESSION['userName'])) {
      header('location:../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ATHENA</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="../assets/img/favicon.png" rel="icon">
  <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link href="../assets/css/project_style.css" rel="stylesheet">
</head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<style>
  table{
    background-color:#1d1b16;
  }
  .finance_btn {
    padding: 10px 30px 10px 30px;
    background-color: inherit;
    border-radius: 30px;
    border: 1px solid #cda45e;
    width: 100%;
    color: white;
  }

  #new_password_input,
#confirm_password_input {
  border: 1px solid white;
    background-color: inherit;
    color:white;
    outline: none; /* Disable default outline */
    box-shadow: none; /* Disable default box shadow */
}

#new_password_input::placeholder,
#confirm_password_input::placeholder {
    font-size: medium;
    color: white; /* Set placeholder color to white */
}

#new_password_input:focus,
#confirm_password_input:focus {
  border: 1px solid #cda45e; /* Set focus outline color */
}

  .finance_btn:hover {
    background-color: #cda45e;
  }

  .user_details table {
    border-collapse: collapse;
    width: 100%;
  }

  .user_details th,
  .user_details td {
    text-align: left;
    padding: 8px;
  }
</style>

<style>
  .image_container {
    position: relative;
    display: inline-block;
    left: 20%;
  }

  .profile-pic {
    border-radius: 50%;
    /* Creates a circular shape */
    width: 150px;
    height: 150px;
    object-fit: cover;
  }

  .change-pic-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    /* Center the button */
    background-color: rgba(0, 0, 0, 0.5);
    color: #aaaaaa;
    padding: 52px 47px;
    border: none;
    cursor: pointer;
    display: none;
    /* Initially hidden */
    border-radius: 50%;
    /* Ensures the button stays within the circular shape */
  }


  .image_container:hover .change-pic-btn {
    display: block;
    /* Show the button on hover */
  }

  .image_overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    /* Semi-transparent black */
    border-radius: 50%;
    /* Ensures the overlay stays within the circular shape */
    opacity: 0;
    /* Initially transparent */
    transition: opacity 0.3s ease;
    /* Smooth transition */
  }

  .image_container:hover .image_overlay {
    opacity: 1;
    /* Make the overlay visible on hover */
  }
</style>
<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-center justify-content-md-between">

      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-phone d-flex align-items-center"><span>+91 5589 55488 55</span></i>
        <i class="bi bi-clock d-flex align-items-center ms-4"><span> Mon-Sat: 10AM - 20PM</span></i>
      </div>
      <?php
      if (isset($_SESSION['userName'])) {
        echo "<div style='font-weight:600;'>Welcome <span style='color: #cda45e;'>" . $_SESSION['userName'] . "</span></div>";
      } else {
      ?>
        <div class="languages d-none d-md-flex align-items-center" onclick="window.location.href='../login.php'">
          <ul>
            <li>Login</li>
            <li><a href="#">Register</a></li>
          </ul>
        </div>
      <?php
      }
      ?>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-cente">
    <div class="container-fluid container-xl d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="../index.php"><img src="../logo.png"></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="../index.php#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="../index.php#about">About</a></li>
          <li><a class="nav-link scrollto" href="../index.php#menu">Menu</a></li>
          <li><a class="nav-link scrollto" href="../index.php#specials">Specials</a></li>
          <li><a class="nav-link scrollto" href="../index.php#events">Events</a></li>
          <li><a class="nav-link scrollto" href="../index.php#chefs">Chefs</a></li>
          <li><a class="nav-link scrollto" href="../index.php#gallery">Gallery</a></li>
          <li><a class="nav-link scrollto" href="../index.php#contact">Contact</a></li>
          <li class="dropdown"><a href="../ChefCart/index.php"><span>Cloud Chef</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="../ChefCart/index.php">Home</a></li>
              <li><a href="../ChefCart/index.php#bookingstart">Booking</a></li>
              <li><a href="../ChefCart/index.php#myteamstart">Culinary Clan</a></li>
              <li><a href="../ChefCart/index.php#contactstart">Join the Cloud Crew</a></li>
            </ul>
          </li>
          <?php if (isset($_SESSION['userName'])) { ?>
            <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
              <ul>
                <li><a href="#">Profile</a></li>
                <li><a href="#">Bookings</a></li>
                <li><a href="../logout.php">Log-Out</a></li>
              </ul>
            </li><?php } ?>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      <a href="Booking.php" class="book-a-table-btn scrollto d-none d-lg-flex">Book a table</a>

    </div>
  </header><!-- End Header -->

  <main id="main">
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>User Details</h2>
          <ol>
            <li><a href="../index.html">Home</a></li>
            <li>Profile </li>
          </ol>
        </div>
      </div>
    </section>

    <section class="inner-page">
      <div class="container">
      <div class="content-wrapper">
          <div class="row" style="justify-content: center;">
            <div class="col-lg-6 grid-margin stretch-card" >
              <div class="card" style="background-color:#1d1b16; color :white;">
                <div class="card-body">
                  <div class="image_container" style="margin-left: 70px;">
                    <img src="" class="profile-pic" id="profile-pic" alt="Profile Picture">
                    <div class="image_overlay"></div> <!-- Overlay div for hover effect -->
                    <button class="change-pic-btn" onclick="document.getElementById('fileInput').click()">Change Picture</button>
                    <input type="file" id="fileInput" style="display: none;" accept="image/*" onchange="uploadImage(event)">
                  </div>
                  <div class="user_details"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Athena</h3>
              <p>
                Prinsengracht 456 <br>
                1016 HL Amsterdam, Netherlands<br><br>
                <strong>Phone:</strong> +1 5589 55488 55<br>
                <strong>Email:</strong> Athena@gmail.com<br>
              </p>
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php#hero">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php#about">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php#why-us">Why us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../crew_login.php">Staff Login</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Table Reservation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Food Reservation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Event Management</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Open Bar</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../index.php">Cloud Chef</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Explore the culinary wonders of Athena Restaurant in Amsterdam, where every dish is a masterpiece, and indulge in exclusive offers and events by subscribing to our newsletter today!</p>
            <form action="" method="post">
              <input type="email" name="email"><input type="submit" value="Subscribe">
            </form>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Athena</span></strong>. All Rights Reserved.Deepak
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main-project.js"></script>
  <script>
  // AJAX function to fetch image path from the database
  function fetchProfilePic() {
  var xhr = new XMLHttpRequest();
  xhr.open('GET', 'fetch_image.php', true);
  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var base_image_url = "../assets/img/users_images/";
      var image_name = xhr.responseText.trim(); // Trim to remove any whitespace
      var full_image_url = base_image_url + image_name;
      // Set the src attribute using jQuery
      console.log("Full image URL: ", full_image_url);
$('.profile-pic').attr('src', full_image_url);
    }
  };
  xhr.send();
}


  function uploadImage(event) {
  var file = event.target.files[0];
  
  // Check if a file is selected
  if (!file) {
    alert('Please select an image file.');
    return;
  }

  // Check if the selected file is an image
  if (!file.type.startsWith('image/')) {
    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: 'error',
          title: 'Please select an image file.!'
        });
    return;
  }

  // Check if the file size is not too big (e.g., 5 MB)
  var maxSizeInBytes = 5 * 1024 * 1024; // 5 MB
  if (file.size > maxSizeInBytes) {
    const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: 'error',
          title: 'Please select a smaller image file (max 5 MB).'
        });
    return;
  }

  var formData = new FormData();
  formData.append('image', file);

  var xhr = new XMLHttpRequest();
  xhr.open('POST', 'upload_image.php', true);

  xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var response = JSON.parse(xhr.responseText);
      if (response.success) {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: 'success',
          title: 'Image uploaded successfully!'
        });
        setTimeout(function() {
          window.location.reload();
        }, 2900);
      } else {
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 3000,
          timerProgressBar: true,
          didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
          }
        });
        Toast.fire({
          icon: 'error',
          title: 'Failed to upload image!'
        });
      }
    }
  };
  xhr.send(formData);
}



  // Fetch profile picture when the page loads
  window.onload = function() {
    fetchProfilePic();

    // Show change picture button only when hovering over the image
    document.querySelector('#profile-pic').addEventListener('mouseover', function() {
      document.querySelector('.change-pic-btn').style.display = 'block';
    });

    document.querySelector('#profile-pic').addEventListener('mouseout', function() {
      document.querySelector('.change-pic-btn').style.display = 'none';
    });
  };
</script>
<script>
  $(document).ready(function() {
    fetchUserDetails();
  });

  function fetchUserDetails() {
    $.ajax({
      url: 'fetch_user_details.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var statusMessage = (data.Status == 1) ? 'Enabled' : 'Disabled';

        // Update HTML content with fetched data and status message in table-like structure
        $('.user_details').html(`
                        <table>
                            <tr><th colspan="2">User Details</th></tr>
                            <tr><td>Full Name:</td><td>${data.FullName}</td></tr>
                            <tr><td>Email:</td><td>${data.Email}</td></tr>
                            
                    <tr><th colspan="2">Change Password</th></tr>
                    <tr><td><input id='new_password_input' type='password' class="form-control form-control-lg" placeholder='New Password'></td><td><input id='confirm_password_input' type='password' class="form-control form-control-lg" placeholder='Confirm New Password'></td></tr>
                    <tr><th colspan="2" id='password_error'><br></th></tr
                    <tr><th colspan="2"><button class="finance_btn" onclick='updatePassword()'>Update</button></th></tr>
                        </table>
                    `);
      },
      error: function(xhr, status, error) {
        console.log('Error:', error);
      }
    });
  }

  // Function to update the password
  function updatePassword() {
    var newPassword = $('#new_password_input').val();
    var confirmPassword = $('#confirm_password_input').val();

    // Basic validation
    if (newPassword.length < 8) {
        $('#password_error').text('Password must be at least 8 characters long').show();
        $('#new_password_input, #confirm_password_input').css('border-color', 'red');
        return; // Stop further execution
    }

    if (newPassword !== confirmPassword) {
        $('#password_error').text('Passwords do not match').show();
        $('#new_password_input, #confirm_password_input').css('border-color', 'red');
        return; // Stop further execution
    }

    // AJAX request to update the password
    $.ajax({
        type: 'POST',
        url: 'update_password.php', // Change the URL to your backend endpoint
        data: { new_password: newPassword },
        success: function(response) {
            // Handle success response
            $('#new_password_input, #confirm_password_input').css('border-color', 'green');
            $('#password_error').hide();
            const Toast = Swal.mixin({
              toast: true,
              position: 'top-end',
              showConfirmButton: false,
              timer: 2500,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: 'success',
              title: 'Password Updated'
            });
        },
        error: function(xhr, status, error) {
            // Handle error response
            $('#password_error').text('Error updating password').show();
            $('#new_password_input, #confirm_password_input').css('border-color', 'red');
        }
    });
  }

  // Call updatePassword function when the update button is clicked
  $(document).on('click', '.finance_btn', function() {
    updatePassword();
  });

</script>
</body>

</html>
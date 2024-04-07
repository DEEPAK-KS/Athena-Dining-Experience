<?php
session_start();
if (isset($_SESSION['SuperAdmin']) || isset($_SESSION['admin'])) {
  header('Location: ../../admin/template/index.php');
} else if (!(isset($_SESSION['staff']))) {
  header('Location:../../crew_login.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Athena|Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End Plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<style>
  .finance_btn {
    padding: 10px 30px 10px 30px;
    background-color: inherit;
    border-radius: 30px;
    border: 1px solid #cda45e;
    width: 100%;
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
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="../../index.php"><img src="../../assets/images/logo.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini" href="../../index.php">
          <img src="../../assets/images/logo-mini.png" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic" style="height:min-content;">
              <div class="count-indicator">
                <img class="img-xs rounded-circle logo-mini" src="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['staff_name'];  ?></h5>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <div class="dropdown-divider"></div>
              <a href="../samples/profile.php" class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-dark rounded-circle">
                    <i class="mdi mdi-onepassword  text-info"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <p class="preview-subject ellipsis mb-1 text-small">Change Password</p>
                </div>
              </a>
            </div>
          </div>
        </li>
        <li class="nav-item nav-category" style="margin: 0;">
          <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../samples/profile.php">
            <span class="menu-icon">
              <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title"><?php echo $_SESSION['user_type'];  ?></span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../../index.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../Leave/leave.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Leave Application</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="../../pages/charts/statistics.php">
            <span class="menu-icon">
              <i class="mdi mdi-chart-bar"></i>
            </span>
            <span class="menu-title">Statistics</span>
          </a>
        </li>
      </ul>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center">
          <a class="navbar-brand brand-logo-mini" href="../../index.php">
            <img class="logo-mini" src="" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch">
          <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="mdi mdi-menu"></span>
          </button>
          <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
              <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
                <div class="navbar-profile">
                  <img class="img-xs rounded-circle logo-mini" src="" alt="">
                  <p class="mb-0 d-none d-sm-block navbar-profile-name">Admin</p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="../samples/profile.php">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-settings text-success"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Settings</p>
                  </div>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item" href="../../admin_logout.php">
                  <div class="preview-thumbnail">
                    <div class="preview-icon bg-dark rounded-circle">
                      <i class="mdi mdi-logout text-danger"></i>
                    </div>
                  </div>
                  <div class="preview-item-content">
                    <p class="preview-subject mb-1">Log out</p>
                  </div>
                </a>
            </li>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="mdi mdi-format-line-spacing"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" style="margin-left: 80px;">
                  <h4 class="card-title"><?php echo $_SESSION['user_type'];  ?></h4>
                  <div class="image_container">
                    <img src="" class="profile-pic" id="profile-pic" alt="Profile Picture">
                    <div class="image_overlay"></div> <!-- Overlay div for hover effect -->
                    <button class="change-pic-btn" onclick="document.getElementById('fileInput').click()">Change Picture</button>
                    <input type="file" id="fileInput" style="display: none;" accept="image/*" onchange="uploadImage(event)">
                  </div>
                  <div class="user_details"></div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body" id="profile_right">

                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Athena 2024</span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>

    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <!-- End custom js for this page -->
</body>
<script>
  $(document).ready(function() {
    // AJAX request to fetch ImagePath
    $.ajax({
      url: '../../fetch_image.php',
      type: 'GET',
      success: function(response) {
        var base_image_url = "../Add Staff/assets/";
        var image_name = response;
        var full_image_url = base_image_url + image_name;
        $('.logo-mini').attr('src', full_image_url);
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  });
</script>
<script>
  // AJAX function to fetch image path from the database
  function fetchProfilePic() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '../../fetch_image.php', true);
    xhr.onreadystatechange = function() {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var base_image_url = "../Add Staff/assets/";
        var image_name = xhr.responseText;
        var full_image_url = base_image_url + image_name;
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
                            <tr><td>Gender:</td><td>${data.Gender}</td></tr>
                            <tr><td>Date of Birth:</td><td>${data.Dob}</td></tr>
                            <tr><td>Type:</td><td>${data.Type}</td></tr>
                            <tr><td>Status:</td><td>${statusMessage}</td></tr>
                        </table>
                    `);

        $('#profile_right').html(`
                <table>
                    <tr><th colspan="2"><br></th></tr>
                    <tr><td>Phone Number :</td><td><input id='phone_number_input' type='number' class="form-control form-control-lg" value='${data.Phone}'></td></tr>
                    <tr><th colspan="2" id='phone_number_error'><br></th></tr>
                    <tr><th colspan="2"><br></th></tr>
                    <tr><td>Cuisine Preferences:</td><td>${data.CuisinePreferences}</td></tr>
                    <tr><th colspan="2"><br></th></tr>
                    <tr><td>Address:</td><td>${data.Address1}, ${data.Address2}, ${data.City}, ${data.State}, ${data.Postcode}, ${data.Country}</td></tr>
                    <tr><th colspan="2"><br></th></tr>
                    <tr><th colspan="2">Change Password</th></tr>
                    <tr><td><input id='new_password_input' type='password' class="form-control form-control-lg" placeholder='New Password'></td><td><input id='confirm_password_input' type='password' class="form-control form-control-lg" placeholder='Confirm New Password'></td></tr>
                    <tr><th colspan="2" id='password_error'><br></th></tr
                    <tr><th colspan="2"><br></th></tr>
                    <tr><th colspan="2"><button class="finance_btn" onclick='updatePassword()'>Update</button></th></tr>
  
                </table>
            `);
      },
      error: function(xhr, status, error) {
        console.log('Error:', error);
      }
    });
  }

  // Function to update the phone number
function updatePhoneNumber() {
    var phoneNumber = $('#phone_number_input').val(); // Assuming you have an input field with id 'phone_number_input'
    
    // Basic validation
    if (phoneNumber.length !== 10 || isNaN(phoneNumber)) {
        $('#phone_number_error').text('Invalid phone number').show();
        $('#phone_number_input').css('border-color', 'red');
        return; // Stop further execution
    }

    // AJAX request to update the phone number
    $.ajax({
        type: 'POST',
        url: 'update_phone_number.php', // Change the URL to your backend endpoint
        data: { phone_number: phoneNumber },
        success: function(response) {
            // Handle success response
            $('#phone_number_input').css('border-color', 'green');
            $('#phone_number_error').hide();
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
          title: 'Phone Number Updated'
        });
        },
        error: function(xhr, status, error) {
            // Handle error response
            $('#phone_number_error').text('Error updating phone number').show();
            $('#phone_number_input').css('border-color', 'red');
        }
    });
}

// Call updatePhoneNumber function when phone number input changes
$(document).on('blur', '#phone_number_input', function() {
    updatePhoneNumber();
});


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


</html>
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
  <title>Admin|Staff</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../../assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../../assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="../../assets/vendors/select2/select2.min.css">
  <link rel="stylesheet" href="../../assets/vendors/select2-bootstrap-theme/select2-bootstrap.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>
<style>
  #comments-column {
    width: 200px;
    /*Adjust the width as needed */
    white-space: unset;
    max-height: 50px;
    overflow-y: auto;
  }

  .table-responsive {
    overflow-x: hidden;
  }

  .swal2-modal .swal2-icon,
  .swal2-modal .swal2-success-ring {
    margin-top: 0;
    margin-bottom: 0px;
  }

  .swal2-modal .swal2-title {
    color: black;
  }

  .pending {
    color: yellow;
  }
</style>
<style>
  /* Apply styles to both input and select elements */
  input,
  select {
    margin: 15px;
    padding: 0px 8px 0px 8px;
    border: 1px solid white;
    background-color: inherit;
    color: white;
    outline: none;
    /* Disable default outline */
    box-shadow: none;
    /* Disable default box shadow */
  }

  select {
    padding: 10px;
  }

  /* Apply styles to placeholders in input elements */
  input::placeholder,
  select::placeholder {
    font-size: medium;
    padding: 10px;
    color: white;
    /* Set placeholder color to white */
  }

  option{
    color: black;
  }

  /* Apply styles on focus for both input and select elements */
  input:focus,
  select:focus {
    border: 1px solid #cda45e;
    /* Set focus outline color */
  }

  .finance_btn {
    padding: 0px 20px 0px 20px;
    background-color: inherit;
    border-radius: 30px;
    border: 1px solid #cda45e;
    color: white;
  }

  .finance_btn:hover {
    background-color: #cda45e;
  }
</style>

<body>
<?php
    if (isset( $_SESSION['leave_applied'])) {
      echo "<script>
        const Toast = Swal.mixin({
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          timer: 2000,
          timerProgressBar: true,
        });
        Toast.fire({
          icon: 'success',
          title: 'Booking successfull'
        });
      </script>";
      unset( $_SESSION['leave_applied']);
    }
    if (isset($_SESSION['leave_error'])) {
      echo "<script>
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
      });
      Toast.fire({
        icon: 'error',
        title: 'Booking Failed, Please try after some time'
      });
    </script>";
      unset($_SESSION['leave_error']);
    }
    ?>
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
          <a class="navbar-brand brand-logo-mini" href="index.php">
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
                  <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['staff_name'];  ?></p>
                  <i class="mdi mdi-menu-down d-none d-sm-block"></i>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown">
                <h6 class="p-3 mb-0">Profile</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
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
          <div class="page-header">
            <h3 class="page-title"> Regularize Leave </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Leave </li>
              </ol>
            </nav>
          </div>
          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Leave Archieve</h4>
                  <div class="table-responsive">
                    <form id="myForm" method="POST" action="apply_leave.php" style="display: flex;">
                      <input type="text" name="startdate" id="startdate" placeholder="Start Date" onblur="validateStartDate()">
                      <input type="text" name="enddate" id="enddate" placeholder="End Date" onblur="validateEndDate()">
                      <input type="text" name="reason" id="reason" placeholder="Reason" onblur="validateReason()">
                      <select name="type" id="type">
                        <option value="PL">PL</option>
                        <option value="NL" selected>NL</option>
                      </select>
                      <button type="submit" class="finance_btn" onclick="submitForm()">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Leave Archieve</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> S/No </th>
                          <th> Start Date </th>
                          <th> End Date </th>
                          <th> Type </th>
                          <th> Reason </th>
                          <th> Status </th>
                        </tr>
                      </thead>
                      <div id="leaveDetailsContainer">
                        <tbody id="leaveDetailsBody">
                          <tr>
                            <td>
                              <img src="assets/images/faces/face4.jpg" alt="image" />
                              <span class="pl-2">Sallie Reyes</span>
                            </td>
                            <td> 02312 </td>
                            <td> 15/02/23 </td>
                            <td> 16/2/23 </td>
                            <td> PL </td>
                            <td>NIL</td>
                            <td>
                              <div class="badge badge-outline-success">Approved</div>
                            </td>
                          </tr>
                        </tbody>
                      </div>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
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
  <script src="../../assets/vendors/select2/select2.min.js"></script>
  <script src="../../assets/vendors/typeahead.js/typeahead.bundle.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="../../assets/js/off-canvas.js"></script>
  <script src="../../assets/js/hoverable-collapse.js"></script>
  <script src="../../assets/js/misc.js"></script>
  <script src="../../assets/js/settings.js"></script>
  <script src="../../assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="../../assets/js/file-upload.js"></script>
  <script src="../../assets/js/typeahead.js"></script>
  <script src="../../assets/js/select2.js"></script>
  <!-- End custom js for this page -->
</body>
<script>
  $(document).ready(function() {
    // Fetch data from the server using AJAX
    $.ajax({
      url: 'fetch_leave.php', // URL to your server-side script that fetches data from the database
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Clear previous data
        $('#leaveDetailsBody').empty();
        var count = 1;
        // Iterate through the fetched data and populate the table
        $.each(data, function(index, row) {
          var base_image_url = "pages/Add Staff/assets/";
          var image_name = row.Image;
          var full_image_url = base_image_url + image_name;
          var actionButton = ''; // Default value for action button
          if (row.LeaveStatus === 'Approved') {
            var style = 'badge badge-outline-success';
          } else if (row.LeaveStatus === 'Pending') {
            // If leave status is 'Pending', replace with a Cancel button
            var style = ''; // No specific style needed
            actionButton = '<button class="btn btn-sm btn-danger cancel-btn" data-leave-id="' + row.LeaveStatusId + '">Cancel</button>';
          } else {
            var style = 'badge rejected';
          }
          var rowHTML = '<tr>' +
            '<td><span class="pl-2">' + count++ + '</span></td>' +
            '<td>' + row.StartDate + '</td>' +
            '<td>' + row.EndDate + '</td>' +
            '<td>' + row.Type + '</td>' +
            '<td id="comments-column">' + row.Reason + '</td>' +
            '<td><div class="' + style + '">' + (row.LeaveStatus === 'Pending' ? actionButton : row.LeaveStatus) + '</div></td>' + // Insert the action button or status here
            '</tr>';
          $('#leaveDetailsBody').append(rowHTML);
        });
      },
      error: function(xhr, status, error) {
        console.error("Error fetching data: " + error);
      }
    });

    // Handle click event for the cancel button
    $(document).on('click', '.cancel-btn', function() {
      // Retrieve the leave ID from the data attribute
      var leaveID = $(this).data('leave-id');
      // Confirm cancellation
      if (confirm("Are you sure you want to cancel this leave?")) {
        // Send cancellation request via AJAX
        $.ajax({
          url: 'cancel_leave.php', // URL to your server-side script that cancels the leave
          type: 'POST',
          data: { leave_id: leaveID }, // Pass the leave ID to the server
          dataType: 'json',
          success: function(response) {
            // Check if cancellation was successful
            if (response.success) {
              // Reload the page or update the table as needed
              location.reload(); // Reload the page for demonstration purposes
            } else {
              // Handle error
              alert("Error cancelling leave: " + response.error);
            }
          },
          error: function(xhr, status, error) {
            console.error("Error cancelling leave: " + error);
          }
        });
      }
    });
  });
</script>


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
  flatpickr("#startdate", {
    dateFormat: "Y-m-d",
    allowInput: true,
  });

  flatpickr("#enddate", {
    dateFormat: "Y-m-d",
    allowInput: true,
  });
</script>
<script>
  function validateStartDate() {
    var startDateInput = document.getElementById('startdate');
    var startDate = new Date(startDateInput.value);
    var today = new Date();
    var minDate = new Date(today.setDate(today.getDate() + 1)); // Minimum date should be at least 1 day in the future
    if (startDate < minDate) {
      alert("Start date should be at least 1 day in the future.");
      startDateInput.value = ''; // Clear the input field
    }
  }

  function validateEndDate() {
    var startDate = new Date(document.getElementById('startdate').value);
    var endDate = new Date(document.getElementById('enddate').value);
    if (endDate <= startDate) {
      alert("End date should be after the start date.");
      document.getElementById('enddate').value = ''; // Clear the input field
    }
  }

  function validateReason() {
    var reason = document.getElementById('reason').value.trim();
    if (reason === '') {
      alert("Please provide a reason.");
    }
  }

  function submitForm() {
    validateStartDate();
    validateEndDate();
    validateReason();

    // If all validations pass, submit the form
    var errors = document.querySelectorAll('.error');
    if (errors.length === 0) {
      document.getElementById('myForm').submit();
    }
  }
</script>

</html>
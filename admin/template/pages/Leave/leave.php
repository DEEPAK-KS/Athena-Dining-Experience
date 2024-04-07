<?php
session_start();
if (!isset($_SESSION['SuperAdmin'])) {
  if (!isset($_SESSION['admin'])) {
    header('Location:../../../../index.php');
  }
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
                <div class="profile-name" >
                  <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['staff_name'];  ?></h5>
                </div>
              </div>
              <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
              <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item preview-item">
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
            <a class="nav-link" href="../Add Staff/Staff.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
              <span class="menu-title">Manage Staff</span>
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
            <h3 class="page-title"> Leave Request </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Staff
                  Leave </li>
              </ol>
            </nav>
          </div>
          <div class="row ">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Leave Requests</h4>
                  <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th> Staff Name </th>
                          <th> Staff Id </th>
                          <th> Start Date </th>
                          <th> End Date </th>
                          <th> Type </th>
                          <th> Reason </th>
                          <th> Status </th>
                        </tr>
                      </thead>
                      <tbody id="staff_leave">
                        <tr>
                          <td>
                            <img src="../Add Staff/assets/" alt="image" />
                            <span class="pl-2">Staff Name</span>
                          </td>
                          <td> Staff ID </td>
                          <td> Start date </td>
                          <td> End date </td>
                          <td> PL / Normal </td>
                          <td class="comments-column">Comments</td>
                          <td>
                            <input class="reject_request" type="button" value="Reject" onclick="reject_leave('pass staff id here')">
                            <input class="accpet_request" type="button" value="Accept" onclick="reject_leave('pass staff id here')">
                          </td>
                        </tr>
                      </tbody>
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
  // Define fetchData function in the global scope
  function fetchData() {
    $.ajax({
      url: 'fetch_leave.php', // PHP endpoint to fetch data
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Clear existing table rows
        $('#staff_leave').empty();

        // Iterate over each record in data and append row to table
        $.each(data, function(index, record) {
          var base_image_url = "../Add Staff/assets/";
          var image_name = record.Image;
          var full_image_url = base_image_url + image_name;
          var row = $('<tr>');
          row.append('<td><img src="' + full_image_url + '" alt="image" /><span class="pl-2">' + record.StaffName + '</span></td>');
          row.append('<td>' + record.StaffId + '</td>');
          row.append('<td>' + record.StartDate + '</td>');
          row.append('<td>' + record.EndDate + '</td>');
          row.append('<td>' + record.Type + '</td>');
          row.append('<td id="comments-column">' + record.Reason + '</td>');
          row.append('<td class="pending">' + record.LeaveStatus + '</td>');
          row.append('<td><input class="reject_request" type="button" value="Reject" onclick="reject_leave(' + record.StaffId + ')"><input class="accpet_request" type="button" value="Accept" onclick="accept_leave(' + record.StaffId + ')"></td>');
          $('#staff_leave').append(row);
        });
      },
      error: function(xhr, status, error) {
        // Handle error
        console.error(xhr.responseText);
      }
    });
  }

  $(document).ready(function() {
    // Call fetchData initially to populate table
    fetchData();

    // Optional: Periodically refresh data
    setInterval(fetchData, 60000); // Refresh every 60 seconds
  });

  // Function to handle rejecting leave
  function reject_leave(staffId) {
    Swal.fire({
      title: "Are you sure?",
      icon: "info",
      text: "You won't be able to revert this!",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes, delete it!"
    }).then((result) => {
      if (result.isConfirmed) {
        $.ajax({
          url: 'reject_leave.php', // PHP endpoint to handle rejection
          type: 'POST',
          data: {
            staffId: staffId
          },
          success: function(response) {
            fetchData(); // Call fetchData to update table
            const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
              }
            });
            Toast.fire({
              icon: "success",
              title: "Leave Request Rejected"
            });
          },
          error: function(xhr, status, error) {
            console.error(xhr.responseText);
          }
        });
      }
    });
  }

  // Function to handle accepting leave
  function accept_leave(staffId) {
    $.ajax({
      url: 'accept_leave.php', // PHP endpoint to handle acceptance
      type: 'POST',
      data: {
        staffId: staffId
      },
      success: function(response) {
        fetchData(); // Call fetchData to update table
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
          title: response
        });
      },
      error: function(xhr, status, error) {
        console.error(xhr.responseText);
      }
    });
  }
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

</html>
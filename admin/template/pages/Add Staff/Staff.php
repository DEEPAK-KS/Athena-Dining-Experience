<?php
session_start();
if (isset($_SESSION['admin'])) {
  header('Location:Staff_1.php');
} else if (!isset($_SESSION['SuperAdmin'])) {
  header('Location:../../../../index.php');
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
  <!-- Flatpickr CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

  <!-- Flatpickr JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

</head>
<style>
  .error {
    color: red;
    font-size: 15px;
  }

  .main-panel {
    padding-top: 60px;
  }

  .deactivate-btn {
    border: 2px solid red;
  }

  .deactivate-btn:hover {
    background-color: #880808;
  }

  .activate-btn {
    border: 2px solid #4CBB17;
  }

  .activate-btn:hover {
    background-color: #228B22;
  }

  .del_btn {
    margin-bottom: 8px;
  }
</style>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<body>
  <!------------------------ Deleting a staff -------------------------------------->
  <?php
  if (isset($_SESSION['delete_success'])) {
    $message = $_SESSION['delete_success'];
    echo "<script>
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
      title: '$message'
    });
    </script>";
    unset($_SESSION['delete_success']);
  }
  ?>
  <?php
  if (isset($_SESSION['staff_error'])) {
    $message = $_SESSION['staff_error'];
    echo "<script>
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
      title: '$message'
    });
    </script>";
    unset($_SESSION['staff_error']);
  }
  ?>
  <!--------------------------- Staff set alerts ------------------------------->
  <?php
  if (isset($_SESSION['staff_set'])) {
    echo "<script>
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
      title: 'Registered successfully'
    });
    </script>";
    unset($_SESSION['staff_set']);
  }
  ?>
  <?php
  if (isset($_SESSION['staff_set_error'])) {
    echo ($_SESSION['staff_set_error']);
    $message = $_SESSION['staff_set_error'];
    echo "<script>
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
      title: '$message'
    });
    </script>";
    unset($_SESSION['staff_set_error']);
  }
  ?>
  <!---------------------------------- Done ------------------------------>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="../../index.php">
          <img src="../../assets/images/logo.png" alt="logo" /></a>
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
          <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
            <span class="menu-icon">
              <i class="mdi mdi-playlist-play"></i>
            </span>
            <span class="menu-title">Staff</span>
            <i class="menu-arrow"></i>
          </a>
          <div class="collapse" id="auth">
            <ul class="nav flex-column sub-menu">
              <li class="nav-item"> <a class="nav-link" href="../Add Staff/Staff.php"> Manage Sttaff </a></li>
              <li class="nav-item"> <a class="nav-link" href="../samples/view_staff.php"> View Staff </a></li>
            </ul>
          </div>
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
                  <img class="img-xs rounded-circle logo-mini" src="" alt>
                  <p class="mb-0 d-none d-sm-block navbar-profile-name"><?php echo $_SESSION['staff_name'];  ?></p>
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
          <div class="page-header">
            <h3 class="page-title"> Staff Details </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active" aria-current="page">Staff
                  Details</li>
              </ol>
            </nav>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Staff</h4>
                  <form class="form-sample" id="store_data" action="to_db.php" method="POST" onsubmit="return(validateForm());">
                    <p class="card-description">Personal info</p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="firstName">First Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name" onblur="validateFirstName();">
                            <span class="error" id="firstNameError"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="lastName">Last Name</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="lastName" id="lastName" placeholder="Enter your last name" onblur="validateLastName();">
                            <span class="error" id="lastNameError"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="gender">Gender</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="gender" id="gender" onblur="validateGender();">
                              <option value selected hidden disabled>Gender</option>
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                            <span class="error" id="genderError"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="dob">Date of Birth</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth">
                            <span class="error" id="dobError"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group row" style="width: 50%; margin-left: 0px;">
                        <label class="col-sm-3 col-form-label" for="cuisine">Cuisine</label>
                        <div class="col-sm-9">
                          <select class="js-example-basic-single" multiple="multiple" style="width: 100%; color: black !important;" name="cuisine[]" id="cuisine">
                            <option value="italian">Italian</option>
                            <option value="mexican">Mexican</option>
                            <option value="chinese">Chinese</option>
                            <option value="indian">Indian</option>
                            <option value="french">French</option>
                            <option value="japanese">Japanese</option>
                            <option value="thai">Thai</option>
                            <option value="greek">Greek</option>
                            <option value="spanish">Spanish</option>
                            <option value="mediterranean">Mediterranean</option>
                            <option value="american">American</option>
                            <option value="turkish">Turkish</option>
                            <option value="lebanese">Lebanese</option>
                            <option value="brazilian">Brazilian</option>
                            <option value="argentinian">Argentinian</option>
                            <option value="peruvian">Peruvian</option>
                            <option value="korean">Korean</option>
                            <option value="vietnamese">Vietnamese</option>
                            <option value="indonesian">Indonesian</option>
                            <option value="malaysian">Malaysian</option>
                            <option value="moroccan">Moroccan</option>
                            <option value="caribbean">Caribbean</option>
                            <option value="sushi">Sushi</option>
                            <option value="fusion">Fusion</option>
                            <option value="vegetarian">Vegetarian</option>
                            <option value="vegan">Vegan</option>
                            <option value="gluten-free">Gluten-Free</option>
                            <option value="raw">Raw</option>
                            <option value="organic">Organic</option>
                          </select>
                          <span class="error" id="cuisineError"></span>
                        </div>
                      </div>
                      <div class="col-md-6" style="width: 50%; margin-left: 12px;">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="membershipRadios">Type</label>
                          <div class="col-sm-4">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="Cloud">
                                Cloud
                              </label>
                            </div>
                          </div>
                          <div class="col-sm-5">
                            <div class="form-check">
                              <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="Professional" checked>
                                Professional
                              </label>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="email">Email</label>
                          <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Enter your email" onblur="validateEmail();">
                            <span class="error" id="emailError"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="phone">Phone</label>
                          <div class="col-sm-9">
                            <input type="tel" class="form-control" name="phone" id="phone" placeholder="Enter your phone number" onblur=" validatePhone();">
                            <span class="error" id="phoneError"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p class="card-description">Address</p>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="address1">Address 1</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="address1" id="address1" placeholder="Enter your address line 1" onblur="validateAddress1();">
                            <span class="error" id="address1Error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="state">State</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="state" id="state" placeholder="Enter your state" onblur="validateState();">
                            <span class="error" id="stateError"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="address2">Address 2</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="address2" id="address2" placeholder="Enter your address line 2" onblur="validateAddress2();">
                            <span class="error" id="address2Error"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="postcode">Postcode</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="postcode" id="postcode" placeholder="Enter your postcode" onblur="validatePostcode();">
                            <span class="error" id="postcodeError"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="city">City</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" name="city" id="city" placeholder="Enter your city" onblur="validateCity();">
                            <span class="error" id="cityError"></span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" for="country">Country</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="country" id="country" onblur="country_check();">
                              <option value selected hidden disabled>Select
                                Country</option>
                              <option>India</option>
                              <option>America</option>
                              <option>Italy</option>
                              <option>Russia</option>
                              <option>Britain</option>
                              <option>Portugal</option>
                              <option>Spain</option>
                              <option>Netherlands</option>
                              <!-- Add more countries here -->
                            </select>
                            <span class="error" id="countryError"></span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <input class="hover_mycolor add_staff" type="submit" value="Add Staff">
                  </form>
                </div>
              </div>
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Disable Employee</h4>
                  <p class="card-description"> Once <code> Disabled </code>user cannot Log-In<code>*</code></p>
                  <form method="post" action="remove_staff.php" class="form-inline" style="justify-content: space-between;" onsubmit="return validatedeletion(event);">
                    <div style="width: 40%;">
                      <label class="sr-only" for="Staff_name">Names</label>
                      <div class="input-group mb-2 mr-sm-2" style="margin-right: 20px;">
                        <input list="staff_list" class="form-control" name="staff_input" id="staff_input" placeholder="Search for a staff member" onblur="validateUsername();">
                        <datalist id="staff_list">
                          <!-- Options will be dynamically populated here -->
                        </datalist>
                      </div>
                      <label class="error" id="user_name_error"></label>
                    </div>
                    <div style="width: 40%;">
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control" name="staff_ID" id="staff_ID" placeholder="Staff ID" onblur="validateID();">
                      </div>
                      <label class="error" id="user_ID_error"></label>
                    </div>
                    <div id="button_toggle">

                    </div>
                    <!-- <input class="hover_mycolor add_staff" type="submit" value="Delete"> -->
                    <!-- <button type="submit" name="submit" class="hover_mycolor add_staff" style="margin-bottom: 12px;">Delete</button> -->
                  </form>


                </div>
              </div>
            </div>
            <!-- Promote staff -->
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Set as Admin</h4>
                  <p class="card-description"> Once <code> Promoted </code>user will have all <code> Previlages *</code></p>
                  <form method="post" action="promote_staff.php" class="form-inline" style="justify-content: space-between;" onsubmit="return(validateForm());">
                    <div style="width: 40%;">
                      <label class="sr-only" for="Staff_name">Names</label>
                      <div class="input-group mb-2 mr-sm-2" style="margin-right: 20px;">
                        <input list="staff_promotion" class="form-control" name="staff_name" id="staff_name" placeholder="Search for a staff member" onblur="validateStaffName();">
                        <datalist id="staff_promotion">
                          <!-- Options will be dynamically populated here -->
                        </datalist>
                      </div>
                      <label class="error" id="staff_name_error"></label>
                    </div>
                    <div style="width: 40%;">
                      <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                      <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                          <div class="input-group-text">@</div>
                        </div>
                        <input type="text" class="form-control" name="staff_promotion_ID" id="staff_promotion_ID" placeholder="Staff ID" onblur="validateStaffID();">
                      </div>
                      <label class="error" id="staff_ID_error"></label>
                    </div>
                    <div id="admin_toggle">

                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright
              © Athena 2024</span>
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
  // Function to replace multiple spaces with single space
  function replaceMultipleSpaces(input) {
    return input.trim().replace(/\s+/g, ' ');
  }

  // First Name Validation
  function validateFirstName() {
    var firstNameInput = document.getElementById('firstName');
    var firstNameError = document.getElementById('firstNameError');
    var firstName = replaceMultipleSpaces(firstNameInput.value);
    firstNameInput.value = firstName; // Update value in input

    if (firstName === '') {
      firstNameError.textContent = 'First name is required';
      return false;
    } else if (/[\d]/.test(firstName)) {
      firstNameError.textContent = 'First name should not contain numbers';
      return false;
    } else {
      firstNameError.textContent = '';
      return true;
    }
  }

  // Last Name Validation
  function validateLastName() {
    var lastNameInput = document.getElementById('lastName');
    var lastNameError = document.getElementById('lastNameError');
    var lastName = replaceMultipleSpaces(lastNameInput.value);
    lastNameInput.value = lastName; // Update value in input

    if (lastName === '') {
      lastNameError.textContent = 'Last name is required';
      return false;
    } else if (/[\d]/.test(lastName)) {
      lastNameError.textContent = 'Last name should not contain numbers';
      return false;
    } else {
      lastNameError.textContent = '';
      return true;
    }
  }

  // State Validation
  function validateState() {
    var stateInput = document.getElementById('state');
    var stateError = document.getElementById('stateError');
    var state = replaceMultipleSpaces(stateInput.value);
    stateInput.value = state; // Update value in input

    if (state === '') {
      stateError.textContent = 'State is required';
      return false;
    } else {
      stateError.textContent = '';
      return true;
    }
  }

  // City Validation
  function validateCity() {
    var cityInput = document.getElementById('city');
    var cityError = document.getElementById('cityError');
    var city = replaceMultipleSpaces(cityInput.value);
    cityInput.value = city; // Update value in input

    if (city === '') {
      cityError.textContent = 'City is required';
      return false;
    } else {
      cityError.textContent = '';
      return true;
    }
  }

  // Address 1 Validation
  function validateAddress1() {
    var address1Input = document.getElementById('address1');
    var address1Error = document.getElementById('address1Error');
    var address1 = replaceMultipleSpaces(address1Input.value);
    address1Input.value = address1; // Update value in input

    if (address1 === '') {
      address1Error.textContent = 'Address 1 is required';
      return false;
    } else {
      address1Error.textContent = '';
      return true;
    }
  }

  // Address 2 Validation
  function validateAddress2() {
    var address2Input = document.getElementById('address2');
    var address2Error = document.getElementById('address2Error');
    var address2 = replaceMultipleSpaces(address2Input.value);
    address2Input.value = address2; // Update value in input

    // Address 2 is optional, so no validation needed
    address2Error.textContent = '';
    return true;
  }

  function validatePhone() {
    var phoneInput = document.getElementById('phone');
    var phoneError = document.getElementById('phoneError');
    var phone = phoneInput.value.trim();

    if (phone === '') {
      phoneError.textContent = 'Phone number is required';
      return false;
    } else if (!/^[6-9]\d{9}$/.test(phone)) {
      phoneError.textContent = 'Phone number should be 10 digits and start with 6, 7, 8, or 9';
      return false;
    } else if (/(\d)\1{9}/.test(phone)) {
      phoneError.textContent = 'Phone number cannot have repeating digits';
      return false;
    } else {
      phoneError.textContent = '';
      return true;
    }
  }

  function validateCuisine() {
    var cuisineInput = document.getElementById('cuisine');
    var cuisineError = document.getElementById('cuisineError');
    var cuisine = cuisineInput.value;

    if (cuisine === null || cuisine.length === 0) {
      cuisineError.textContent = 'Please select at least one cuisine';
      return false;
    } else {
      cuisineError.textContent = 'dddd';
      return true;
    }
  }

  function validatePostcode() {
    var postcodeInput = document.getElementById('postcode');
    var postcodeError = document.getElementById('postcodeError');
    var postcode = postcodeInput.value.trim();

    if (postcode === '') {
      postcodeError.textContent = 'Postcode is required';
      return false;
    } else if (postcode.length !== 6 || /\D/.test(postcode)) {
      postcodeError.textContent = 'Postcode must be six digits and contain only numbers';
      return false;
    } else {
      postcodeError.textContent = '';
      return true;
    }
  }

  function validateDOB() {
    var dobInput = document.getElementById('dob');
    var dobError = document.getElementById('dobError');
    var dob = dobInput.value.trim();
    var currentDate = new Date();
    var selectedDate = new Date(dob);

    if (dob === '') {
      dobError.textContent = 'Date of birth is required';
      return false;
    } else if (selectedDate > currentDate) {
      dobError.textContent = 'Date of birth cannot be a future date';
      return false;
    } else {
      var age = calculateAge(selectedDate);
      if (age < 18) {
        dobError.textContent = 'You must be at least 18 years old';
        return false;
      } else {
        dobError.textContent = '';
        return true;
      }
    }
  }

  function calculateAge(birthday) { // Function to calculate age based on date of birth
    var ageDifMs = Date.now() - birthday.getTime();
    var ageDate = new Date(ageDifMs);
    return Math.abs(ageDate.getUTCFullYear() - 1970);
  }


  function validateGender() {
    var genderInput = document.getElementById('gender');
    var genderError = document.getElementById('genderError');
    var gender = genderInput.value;

    if (gender === '') {
      genderError.textContent = 'Please select a gender';
      return false;
    } else {
      genderError.textContent = '';
      return true;
    }
  }

  function validateCountry() {
    var countryInput = document.getElementById('country');
    var countryError = document.getElementById('countryError');
    var country = countryInput.value.trim();

    if (country === '') {
      countryError.textContent = 'Country is required';
      return false;
    } else {
      countryError.textContent = '';
      return true;
    }
  }

  function validateCuisine() {
    const cuisineSelect = document.getElementById('cuisine');
    const selectedCuisines = cuisineSelect.selectedOptions;

    if (selectedCuisines.length === 0) {
      document.getElementById('cuisineError').textContent = 'Please select at least one cuisine.';
      return false;
    } else {
      document.getElementById('cuisineError').textContent = '';
      return true;
    }
  }

  function validateEmail() {
    var emailInput = document.getElementById('email');
    var emailError = document.getElementById('emailError');
    var email = emailInput.value.trim();

    var emailRegex = /^\w+([.-]?\w+)@\w+([.-]?\w+)(.\w{2,3})+$/;

    if (emailRegex.test(email)) {
      emailError.textContent = "";
      return true;
    } else {
      emailError.textContent = "Invalid email address";
      return false;
    }
  }

  function country_check() {
    const country = document.getElementById('country');
    const countryError = document.getElementById('countryError');

    if (country.value === '') {
      countryError.textContent = 'Please select a country';
      return false;
    } else {
      countryError.textContent = '';
      return true;
    }
  }
  // Validate Form on Submit
  function validateForm() {
    var isFormValid = true;

    // Validate first name
    if (!validateFirstName()) {
      isFormValid = false;
    }

    // Validate last name
    if (!validateLastName()) {
      isFormValid = false;
    }

    // Validate state
    if (!validateState()) {
      isFormValid = false;
    }

    // Validate city
    if (!validateCity()) {
      isFormValid = false;
    }

    // Validate address 1
    if (!validateAddress1()) {
      isFormValid = false;
    }

    // Validate address 2
    if (!validateAddress2()) {
      isFormValid = false;
    }

    // Validate phone
    if (!validatePhone()) {
      isFormValid = false;
    }

    // Validate cuisine
    if (!validateCuisine()) {
      isFormValid = false;
    }

    // Validate postcode
    if (!validatePostcode()) {
      isFormValid = false;
    }

    // Validate date of birth
    if (!validateDOB()) {
      isFormValid = false;
    }

    // Validate gender
    if (!validateGender()) {
      isFormValid = false;
    }

    // Validate country
    if (!validateCountry()) {
      isFormValid = false;
    }

    // Validate email
    if (!validateEmail()) {
      isFormValid = false;
    }

    // Check country selection
    if (!country_check()) {
      isFormValid = false;
    }

    if (isFormValid) {
      return true; // Allow form submission
    } else {
      event.preventDefault(); // Prevent form submission
      return false;
    }

  }
  var form = document.getElementById("store_data");
  form.addEventListener("submit", validateForm);
</script>

<script>
  $(document).ready(function() {
    // Event listener for the input field
    $('#staff_input').on('input', function() {
      var inputChar = $(this).val();
      // Perform AJAX request to fetch staff names from the server
      $.ajax({
        url: 'fetch_staff.php', // Change the URL to your server endpoint
        type: 'POST',
        dataType: 'json',
        data: {
          inputChar: inputChar
        },
        success: function(data) {
          // Clear previous options
          $('#staff_list').empty();
          // Append options for each fetched name
          $.each(data, function(index, item) {
            $('#staff_list').append('<option value="' + item.FirstName + ' ' + item.LastName + '">');
          });
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });

    // Event listener for selecting an option from the datalist
    $('#staff_input').on('change', function() {
      var selectedOption = $(this).val(); // Get the selected option
      // Perform AJAX request to fetch the corresponding staff ID
      $.ajax({
        url: 'fetch_staff_id.php', // Change the URL to your server endpoint
        type: 'POST',
        dataType: 'json',
        data: {
          selectedOption: selectedOption
        },
        success: function(data) {
          // Place the retrieved staff ID in the Staff ID input field
          $('#staff_ID').val(data.StaffID);
          checkStatusAndToggleButtons();
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
  $('#staff_ID').on('change', function() {
    checkStatusAndToggleButtons();
  })
</script>
<script>
  function validateUsername() {
    var usernameInput = document.getElementById('staff_input').value;
    var usernameErrorLabel = document.getElementById('user_name_error');
    if (usernameInput.trim() === '') {
      usernameErrorLabel.textContent = 'Username cannot be empty';
      return false;
    } else if (/\d/.test(usernameInput)) {
      usernameErrorLabel.textContent = 'Username cannot contain numbers';
      return false;
    } else {
      usernameErrorLabel.textContent = '';
      return true;
    }
  }

  function validateID() {
    var idInput = document.getElementById('staff_ID').value;
    var idErrorLabel = document.getElementById('user_ID_error');
    if (idInput.trim() === '') {
      idErrorLabel.textContent = 'ID cannot be empty';
      return false;
    } else if (!/^\d+$/.test(idInput)) {
      idErrorLabel.textContent = 'ID must contain only numbers';
      return false;
    } else {
      idErrorLabel.textContent = '';
      return true;
    }
  }

  function validatedeletion(event) {
    var isValidUsername = validateUsername();
    var isValidID = validateID();
    if (!isValidUsername || !isValidID) {
      // Validation failed, prevent form submission
      event.preventDefault();
      return false;
    }
    return true;
  }
</script>
<script>
  function checkStatusAndToggleButtons() {
    var staffInput = document.getElementById("staff_input").value;
    var staffID = document.getElementById("staff_ID").value;

    // Check if both fields have values
    if (staffInput && staffID) {
      // Make an AJAX request to check the status
      $.ajax({
        url: 'toggle_btn.php', // URL to your backend script to toggle the button
        type: 'POST',
        data: {
          staff_input: staffInput,
          staff_ID: staffID
        },
        success: function(response) {
          // Response should contain the status (e.g., 0 for active, 1 for inactive)
          var status = parseInt(response);
          // Remove any existing buttons
          $('#button_toggle').empty();
          // Create and append the appropriate button based on status
          if (status === 1) {
            // Staff is active, create Deactivate button
            $('<input>').addClass('add_staff del_btn deactivate-btn').attr('type', 'submit').val('Deactivate').appendTo('#button_toggle');
          } else {
            // Staff is inactive, create Activate button
            $('<input>').addClass(' add_staff del_btn activate-btn').attr('type', 'submit').val('Activate').appendTo('#button_toggle');
          }
        }
      });
    } else {
      // If any field is empty, remove any existing buttons
      $('#button_toggle').empty();
    }
  }
</script>

<script>
  $(document).ready(function() {
    // AJAX request to fetch ImagePath
    $.ajax({
      url: '../../fetch_image.php',
      type: 'GET',
      success: function(response) {
        var base_image_url = "assets/";
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
  $(document).ready(function() {
    // Event listener for the input field
    $('#staff_name').on('input', function() {
      var inputChar = $(this).val();
      // Perform AJAX request to fetch staff names from the server
      $.ajax({
        url: 'fetch_staff.php', // Change the URL to your server endpoint
        type: 'POST',
        dataType: 'json',
        data: {
          inputChar: inputChar
        },
        success: function(data) {
          // Clear previous options
          $('#staff_promotion').empty();
          // Append options for each fetched name
          $.each(data, function(index, item) {
            $('#staff_promotion').append('<option value="' + item.FirstName + ' ' + item.LastName + '">');
          });
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });

    // Event listener for selecting an option from the datalist
    $('#staff_name').on('change', function() {
      var selectedOption = $(this).val(); // Get the selected option
      // Perform AJAX request to fetch the corresponding staff ID
      $.ajax({
        url: 'fetch_staff_id.php', // Change the URL to your server endpoint
        type: 'POST',
        dataType: 'json',
        data: {
          selectedOption: selectedOption
        },
        success: function(data) {
          // Place the retrieved staff ID in the Staff ID input field
          $('#staff_promotion_ID').val(data.StaffID);
          ToggleAdmin();
        },
        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });
  $('#staff_promotion_ID').on('change', function() {
    ToggleAdmin();
  })
</script>
<script>
  function ToggleAdmin() {
    var staffName = document.getElementById("staff_name").value;
    var staffID = document.getElementById("staff_promotion_ID").value;

    // Check if both fields have values
    if (staffName && staffID) {
      // Make an AJAX request to check the user type
      $.ajax({
        url: 'toggle_admin.php',
        type: 'POST',
        data: {
          staffID: staffID
        },
        success: function(response) {
          // Response should contain the user type (e.g., 'admin' or 'staff')
          var userType = response.trim();
          // Remove any existing buttons
          $('#admin_toggle').empty();
          // Create and append the appropriate button based on user type
          if (userType === 'admin') {
            // User is admin, create Deactivate button
            $('<input>').addClass('add_staff del_btn deactivate-btn').attr('type', 'submit').val('Demote').appendTo('#admin_toggle');
          } else if (userType === 'staff') {
            // User is staff, create Activate button
            $('<input>').addClass('add_staff del_btn activate-btn').attr('type', 'submit').val('Set as Admin').appendTo('#admin_toggle');
          } else {
            // Handle unexpected response
            console.log('Unexpected user type:', userType);
          }
        }
      });
    } else {
      // If any field is empty, remove any existing buttons
      $('#admin_toggle').empty();
    }
  }
</script>

<script>
  function validateStaffName() {
    var staffName = document.getElementById('staff_name').value.trim();
    var lettersOnlyRegex = /^[A-Za-z ]+$/; // Regular expression to allow only letters

    if (staffName === '') {
      document.getElementById('staff_name_error').innerText = 'Please enter a staff name.';
      return false;
    }

    // Replace multiple spaces with a single space
    document.getElementById('staff_name').value = staffName.replace(/\s+/g, ' ');
    if (!lettersOnlyRegex.test(staffName)) {
      document.getElementById('staff_name_error').innerText = 'Only characters are allowed in the staff name.';
      return false;
    }

    // Additional validation logic for staff name if needed

    document.getElementById('staff_name_error').innerText = '';
    return true;
  }

  function validateStaffID() {
    var staffID = document.getElementById('staff_promotion_ID').value.trim();
    var regex = /^[0-9]+$/; // Regular expression to allow only numbers

    if (staffID === '') {
      document.getElementById('staff_ID_error').innerText = 'Please enter a staff ID.';
      return false;
    }

    if (!regex.test(staffID)) {
      document.getElementById('staff_ID_error').innerText = 'Staff ID must contain only numbers.';
      return false;
    }

    // Additional validation logic for staff ID if needed

    document.getElementById('staff_ID_error').innerText = '';
    return true;
  }

  function validateForm() {
    var isValid = true;
    isValid = validateStaffName() && isValid;
    isValid = validateStaffID() && isValid;
    return isValid;
  }
</script>
<script>
  flatpickr("#dob", {
    dateFormat: "Y-m-d",
    // defaultDate: "today",
    altInput: true,
    altFormat: "F j, Y",
    theme: "dark",
    backgroundColor: "inherit",
    onClose: function() {
      validateDOB()
    }
  });
</script>

</html>
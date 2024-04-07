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
  <link rel="stylesheet" href="assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="assets/vendors/jvectormap/jquery-jvectormap.css">
  <link rel="stylesheet" href="assets/vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/vendors/owl-carousel-2/owl.theme.default.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- End layout styles -->
  <link rel="shortcut icon" href="assets/images/favicon.png" />
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<style>
  .base_color {
    color: #cda45e;
  }

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

  .pending {
    color: yellow;
    border: 1px solid yellow;
  }

  .rejected {
    color: red;
    border: 1px solid red;
  }

  #previewList {
    overflow-y: auto;
    /* or overflow-y: scroll; */
    max-height: 50vh;
    /* set your preferred max height */
    ;
    padding-right: 20px;
  }

  #leaveDetailsContainer {
    overflow-y: auto;
    /* or overflow-y: scroll; */
    max-height: 10px;
    /* set your preferred max height */
    ;
  }

  .container {
    display: flex;
    align-items: center;
    width: 300px;
    /* Adjust width as needed */
  }

  .input-with-button {
    position: relative;
  }

  #messageInput {
    padding: 10px 40px 10px 10px;
    /* Adjust padding to accommodate the button */
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    width: 100%;
    /* Adjust width as needed */
  }

  #sendMessageButton {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background-color: #cda45e;
    border: none;
    color: white;
    padding: 5px;
    border-radius: 0 5px 5px 0;
    cursor: pointer;
  }
  #message_container {
    max-height: 250px; /* Set your desired height */
    overflow-y: auto; /* Enable vertical scrolling */
    padding-right: 20px;
}

</style>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo" href="index.php"><img src="assets/images/logo.png" alt="logo" /></a>
        <a class="sidebar-brand brand-logo-mini logo-mini" href="index.php">
          <img src="assets/images/logo-mini.png" alt="logo" /></a>
      </div>
      <ul class="nav">
        <li class="nav-item profile">
          <div class="profile-desc">
            <div class="profile-pic">
              <div class="count-indicator">
                <img class="img-xs rounded-circle logo-mini" src="" alt="">
                <span class="count bg-success"></span>
              </div>
              <div class="profile-name">
                <h5 class="mb-0 font-weight-normal"><?php echo $_SESSION['staff_name'];  ?></h5>
              </div>
            </div>
            <a href="#" id="profile-dropdown" data-toggle="dropdown"><i class="mdi mdi-dots-vertical"></i></a>
            <div class="dropdown-menu dropdown-menu-right sidebar-dropdown preview-list" aria-labelledby="profile-dropdown">
              <div class="dropdown-divider"></div>
              <a href="pages/samples/profile.php" class="dropdown-item preview-item">
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
          <a class="nav-link" href="pages/samples/profile.php">
            <span class="menu-icon">
            <i class="mdi mdi-security"></i>
            </span>
            <span class="menu-title"><?php echo $_SESSION['user_type'];  ?></span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="index.php">
            <span class="menu-icon">
              <i class="mdi mdi-speedometer"></i>
            </span>
            <span class="menu-title">Dashboard</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="pages/Leave/leave.php">
            <span class="menu-icon">
              <i class="mdi mdi-table-large"></i>
            </span>
            <span class="menu-title">Leave Application</span>
          </a>
        </li>
        <li class="nav-item menu-items">
          <a class="nav-link" href="pages/charts/statistics.php">
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
            <img src="" class="logo-mini" alt="logo" /></a>
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
                <a class="dropdown-item preview-item" href="admin_logout.php">
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
          <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Transaction History</h4>
                  <canvas id="transaction-history" class="transaction-chart"></canvas>
                  <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                      <h6 class="mb-1">Cash - In</h6>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                      <input class="font-weight-bold mb-0" type="number" class="form-control form-control-lg" id="cash_in" value="0" style="width: 100px; background-color: inherit; border: none; text-align: end;" disabled>
                    </div>
                  </div><input type="number" class="form-control form-control-lg" id="cash_in_value" hidden>
                  <div class="bg-gray-dark d-flex d-md-block d-xl-flex flex-row py-3 px-4 px-md-3 px-xl-4 rounded mt-3">
                    <div class="text-md-center text-xl-left">
                      <h6 class="mb-1">Cash - Out</h6>
                    </div>
                    <div class="align-self-center flex-grow text-right text-md-center text-xl-right py-md-2 py-xl-0">
                      <input class="font-weight-bold mb-0" type="number" class="form-control form-control-lg" id="cash_out" style="width: 100px; background-color: inherit; border: none; text-align: end;" disabled>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title mb-1">Booking</h4>
                    <p class="text-muted mb-1">Details</p>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="preview-list" id="previewList">
                        <!-- ADD New Data Here -->
                        <div class="preview-item">
                          <div class="preview-thumbnail">
                            <div class="preview-icon">
                              <i class="bi bi-person-circle"></i>
                            </div>
                          </div>
                          <div class="preview-item-content d-sm-flex flex-grow">
                            <div class="flex-grow">
                              <h6 class="preview-subject">Customer name here</h6>
                              <p class="text-muted mb-0">Customer Id here</p>
                            </div>
                            <div class="mr-auto text-sm-right pt-2 pt-sm-0">
                              <p class="text-muted">Table Name</p>
                              <p class="text-muted mb-0">date here, time here </p>
                            </div>
                          </div>
                        </div>
                        <!-- End Here -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-row justify-content-between">
                    <h4 class="card-title">Admin Chat</h4>
                  </div>
                  <div class="preview-list" id="message_container">
                    <!-- start     -->
                    <div class="preview-item border-bottom">
                      <div class="preview-thumbnail">
                        <img src="assets/images/faces/face8.jpg" alt="image" class="rounded-circle" />
                      </div>
                      <div class="preview-item-content d-flex flex-grow">
                        <div class="flex-grow">
                          <div class="d-flex d-md-block d-xl-flex justify-content-between">
                            <h6 class="preview-subject">Luella Mills</h6>
                            <p class="text-muted text-small">10 Minutes Ago</p>
                          </div>
                          <p class="text-muted">Well, it seems to be working now.</p>
                        </div>
                      </div>
                    </div>
                    <!-- end -->
                  </div>
                </div>
                <div class="container" style="margin-bottom: 20px; width:100%;">
                    <div class="input-with-button" style="width: 100%;">
                      <input type="text" id="messageInput" placeholder="Type your message..." style="background-color: inherit; border: 2px solid #2c2e33;">
                      <button id="sendMessageButton"><i class="bi bi-arrow-bar-right"></i></button>
                    </div>
                  </div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Portfolio Slide</h4>
                  <div class="owl-carousel owl-theme full-width owl-carousel-dash portfolio-carousel" id="owl-carousel-basic">
                    <div class="item">
                      <img src="assets/images/dashboard/Rectangle.jpg" alt="">
                    </div>
                    <div class="item">
                      <img src="assets/images/dashboard/Img_5.jpg" alt="">
                    </div>
                    <div class="item">
                      <img src="assets/images/dashboard/img_6.jpg" alt="">
                    </div>
                  </div>
                  <div class="d-flex py-4">
                    <div class="preview-list w-100">
                      <div class="preview-item p-0">
                        <div class="preview-thumbnail">
                          <img src="assets/images/faces/face12.jpg" class="rounded-circle" alt="">
                        </div>
                        <div class="preview-item-content d-flex flex-grow">
                          <div class="flex-grow">
                            <div class="d-flex d-md-block d-xl-flex justify-content-between">
                              <h6 class="preview-subject">CeeCee Bass</h6>
                              <p class="text-muted text-small">4 Hours Ago</p>
                            </div>
                            <p class="text-muted">Well, it seems to be working now.</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted">Well, it seems to be working now. </p>
                  <div class="progress progress-md portfolio-progress">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 col-xl-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">To do list</h4>
                  <div class="add-items d-flex">
                    <input type="text" class="form-control todo-list-input" placeholder="enter task..">
                    <button class="add btn btn-primary todo-list-add-btn">Add</button>
                  </div>
                  <div class="list-wrapper">
                    <ul class="d-flex flex-column-reverse text-white todo-list todo-list-custom">
                      <li>
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Create invoice </label>
                        </div>
                        <i class="remove mdi mdi-close-box"></i>
                      </li>
                      <li>
                        <div class="form-check form-check-primary">
                          <label class="form-check-label">
                            <input class="checkbox" type="checkbox"> Meeting with Alita </label>
                        </div>
                        <i class="remove mdi mdi-close-box"></i>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Across the Globe</h4>
                  <div class="row">
                    <div class="col-md-5">
                      <div class="table-responsive">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-us"></i>
                              </td>
                              <td>USA</td>
                              <td class="text-right"> 1500 </td>
                              <td class="text-right font-weight-medium"> 56.35% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-de"></i>
                              </td>
                              <td>Germany</td>
                              <td class="text-right"> 800 </td>
                              <td class="text-right font-weight-medium"> 33.25% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-au"></i>
                              </td>
                              <td>Australia</td>
                              <td class="text-right"> 760 </td>
                              <td class="text-right font-weight-medium"> 15.45% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-gb"></i>
                              </td>
                              <td>United Kingdom</td>
                              <td class="text-right"> 450 </td>
                              <td class="text-right font-weight-medium"> 25.00% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-ro"></i>
                              </td>
                              <td>Romania</td>
                              <td class="text-right"> 620 </td>
                              <td class="text-right font-weight-medium"> 10.25% </td>
                            </tr>
                            <tr>
                              <td>
                                <i class="flag-icon flag-icon-br"></i>
                              </td>
                              <td>Brasil</td>
                              <td class="text-right"> 230 </td>
                              <td class="text-right font-weight-medium"> 75.00% </td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <div class="col-md-7">
                      <div id="audience-map" class="vector-map"></div>
                    </div>
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
  <script src="assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="assets/vendors/chart.js/Chart.min.js"></script>
  <script src="assets/vendors/progressbar.js/progressbar.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap.min.js"></script>
  <script src="assets/vendors/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <script src="assets/vendors/owl-carousel-2/owl.carousel.min.js"></script>
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="assets/js/off-canvas.js"></script>
  <script src="assets/js/hoverable-collapse.js"></script>
  <script src="assets/js/misc.js"></script>
  <script src="assets/js/settings.js"></script>
  <script src="assets/js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <script src="assets/js/dashboard.js"></script>
  <!-- End custom js for this page -->
</body>
<script>
  // Function to fetch Booking data from DB
  function fetchData() {
    // AJAX request
    $.ajax({
      url: 'fetchbooking.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        // Clear previous data
        $('#previewList').empty();

        // Loop through each booking detail
        $.each(data, function(index, booking) {
          // Construct HTML for each booking detail
          var html = '<div class="preview-item">' +
            '<div class="preview-thumbnail">' +
            '<div class="preview-icon base_color">' +
            '<i class="bi bi-person-workspace"></i>' +
            '</div>' +
            '</div>' +
            '<div class="preview-item-content d-sm-flex flex-grow">' +
            '<div class="flex-grow">' +
            '<h6 class="preview-subject">' + booking.customer_name + '</h6>' +
            '<p class="text-muted mb-0">Customer Id: ' + booking.customer_id + '</p>' +
            '<p class="text-muted mb-0">Phone Number: ' + booking.phone + '</p>' +
            '</div>' +
            '<div class="mr-auto text-sm-right pt-2 pt-sm-0">' +
            '<p class="text-muted">Table Name: ' + booking.table_name + '</p>' +
            '<p class="text-muted mb-0">Date: ' + booking.booking_date + ', Time: ' + booking.booking_time + '</p>' +
            '<p class="text-muted">Email: ' + booking.email + '</p>' +
            '</div>' +
            '</div>' +
            '</div>';
          // Append HTML to the preview list
          $('#previewList').append(html);
        });
      },
      error: function(xhr, status, error) {
        console.error('Error fetching data:', error);
      }
    });
  }
  // Call the fetchData function when the page loads
  $(document).ready(function() {
    fetchData();
  });
</script>
<script>
  function fetchMessages() {
    // AJAX request to fetch messages
    $.ajax({
      url: "fetch_messages.php",
      type: "GET",
      dataType: "json",
      success: function(data) {
        // Iterate over each message
        $('#message_container').empty();
        $.each(data, function(index, message) {
          // Create HTML for each message
          var messageHtml = '<div class="preview-item border-bottom d-flex justify-content-between">' +
            '<div class="preview-item-content d-flex flex-grow">' +
            '<div class="flex-grow">' +
            '<div class="d-flex d-md-block d-xl-flex justify-content-between">' +
            '<h6 class="preview-subject"></h6>' +
            '<p class="text-muted text-small">' + message.time_difference + '</p>' +
            '</div>' +
            '<p class="text-muted">' + message.message + '</p>' +
            '</div>' +
            '</div>' +
            // Add delete button (X button) on the right side
            '<button class="btn btn-danger delete-btn" onclick="deleteMessage(' + message.message_id + ')" style="margin-top:20px">X</button>' +
            '</div>';

          // Append the message HTML to the preview-list
          $("#message_container").append(messageHtml);
        });
      },
      error: function(xhr, status, error) {
        console.error("Error fetching messages:", error);
      }
    });
  };

  // Function to delete a message
  function deleteMessage(messageId) {
    // AJAX request to delete the message
    $.ajax({
      url: "delete_message.php",
      type: "POST",
      data: { message_id: messageId },
      success: function(response) {
        // If message deleted successfully, fetch messages again to update UI
        fetchMessages();
      },
      error: function(xhr, status, error) {
        console.error("Error deleting message:", error);
      }
    });
  }

  fetchMessages(); // Call fetchMessages() when the page loads
</script>



<script>
  $(document).ready(function() {
    // AJAX request to fetch ImagePath
    $.ajax({
      url: 'fetch_image.php',
      type: 'GET',
      success: function(response) {
        var base_image_url = "pages/Add Staff/assets/";
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
  document.getElementById("sendMessageButton").addEventListener("click", function() {
    var message = document.getElementById("messageInput").value;
    document.getElementById("messageInput").value='';
    
    // Create a new XMLHttpRequest object
    var xhr = new XMLHttpRequest();
    
    // Configure it: POST-request for the URL of your PHP script
    xhr.open('POST', 'message.php', true);
    
    // Set the content type of the request to JSON
    xhr.setRequestHeader('Content-Type', 'application/json');
    
    // Define what happens on successful data submission
    xhr.onload = function () {
        if (xhr.status >= 200 && xhr.status < 300) {
            // Request was successful, you can handle the response here
            fetchMessages()
            console.log(xhr.responseText);
        } else {
            // Request failed, handle errors here
            console.error(xhr.statusText);
        }
    };
    
    // Define what happens in case of an error
    xhr.onerror = function () {
        console.error('Request failed');
    };
    
    // Convert the message to JSON format
    var jsonData = JSON.stringify({ message: message });
    
    // Send the request
    xhr.send(jsonData);
});

</script>
<script>
  $(document).ready(function() {
    // Function to fetch total profit for today from the server
    function fetchTotalProfitToday() {
      $.ajax({
        url: 'fetch_profit_today.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          // Remove commas from the number string and parse it as a float
          var totalProfit = parseFloat(response.today.replace(/,/g, ''));
          // Check if the parsed value is valid
          if (!isNaN(totalProfit)) {
            // Format the total profit with commas
            var formattedTotal = totalProfit.toLocaleString();
            $('#dailyIncome').text(formattedTotal);
            $('#dailyIncome_per').text(response.percentageDifference + '%');
            document.getElementById('cash_in').value = totalProfit;
            setchart();
            if (response.percentageDifference < 0) {
              document.getElementById('dailyIncome_per').style.color = 'red';
            } else {
              document.getElementById('dailyIncome_per').style.color = '#00d25b';
            }
          } else {
            console.error('Invalid total profit value:', response.today);
          }
        },
        error: function(xhr, status, error) {
          console.error('Error fetching total profit for today:', error);
        }
      });
    }

    // Call the fetchTotalProfitToday function initially when the page loads
    fetchTotalProfitToday();

    // Optionally, you can set a timer to refresh the total profit for today periodically
    // setInterval(fetchTotalProfitToday, 60000); // Refresh every minute (adjust as needed)
  });
</script>
<script>
  $(document).ready(function() {
    // Function to fetch total expense from the server
    function fetchTotalExpense() {
      $.ajax({
        url: 'fetch_expense.php', // Assuming this is the server endpoint to fetch total expense
        type: 'GET',
        dataType: 'json',
        success: function(response) {
          // Update the total expense in the div
          $('#expenseCurrent').text(response.total);
          document.getElementById('cash_out').value = (response.today).replace(/,/g, '');
          setchart();
        },
        error: function(xhr, status, error) {
          console.error('Error fetching total expense:', error);
        }
      });
    }

    // Call the fetchTotalExpense function initially when the page loads
    fetchTotalExpense();

    // Optionally, you can set a timer to refresh the total expense periodically
    // setInterval(fetchTotalExpense, 60000); // Refresh every minute (adjust as needed)
  });
</script>
</html>
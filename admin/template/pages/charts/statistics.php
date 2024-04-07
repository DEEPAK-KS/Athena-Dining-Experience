<?php
session_start();
if(!isset($_SESSION['SuperAdmin'])){
  if(!isset($_SESSION['admin'])){
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="shortcut icon" href="../../assets/images/favicon.png" />
  </head>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <style>
    .finance_btn{
      padding: 10px 30px 10px 30px;
      background-color: inherit;
      border-radius: 30px;
      border: 1px solid #cda45e;
      width: 100%;
    }
    .finance_btn:hover{
      background-color: #cda45e;
    }
    .error{
      color: red;
      font-size:medium !important;
    }
    .form-group{
      margin: 0px
    }
  </style>
  <body>
  <?php
   if (isset($_SESSION['transaction'])) {
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
      title: 'Inserted successfully'
    });
    </script>";
      unset($_SESSION['transaction']);
   }
?>
<?php
 if (isset($_SESSION['transaction_error'])) {
  $message=$_SESSION['transaction_error'];
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
    unset($_SESSION['transaction_error']);
}
?>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
          <a class="sidebar-brand brand-logo" href="../../index.php"><img src="../../assets/images/logo.png" alt="logo" /></a>
          <a class="sidebar-brand brand-logo-mini" href="index.php">
          <img src="../../assets/images/logo-mini.png"  alt="logo" /></a>
        </div>
        <ul class="nav">
          <li class="nav-item profile">
            <div class="profile-desc">
              <div class="profile-pic">
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
            <a class="navbar-brand brand-logo-mini" href="../../index.php">
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
              <h3 class="page-title"> Financial Statistics </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Admin</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Statistics</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <form id="transactionForm" action="update_transaction.php" method="POST" onsubmit="return(validateForm());">
                      <h4 class="card-title">Financial Transaction</h4>
                      <p>Transactions recorded <code>Cannot</code> be edited<code>*</code></p>
                      <div class="form-group">
                          <label>Enter Amount</label>
                          <input type="number" class="form-control form-control-lg" name="amountInput" id="amountInput" placeholder="Enter The Amount" aria-label="Enter The Amount" onblur="validateAmount();">
                          <label id="financialAmountError" class="error"></label>
                      </div>
                      <div class="form-group">
                        <label>Description</label>
                        <input type="text" class="form-control form-control-lg" name="descInput" id="descInput" placeholder="Transaction Note" aria-label="Description" onblur="validateDesc();">
                        <label id="DescError" class="error"></label>
                      </div>
                      <div class="form-group">
                          <label for="exampleFormControlSelect1">Type Of Transaction</label>
                          <select class="form-control form-control-lg" name="transactionTypeSelect" id="transactionTypeSelect" onblur="validateTransactionType();">
                              <option value="" selected hidden disabled>Select Type</option>
                              <option value="Expense">Expense</option>
                              <option value="Income">Income</option>
                          </select>
                          <label id="financialTypeError" class="error"></label>
                      </div>
                      <div class="form-group">
                          <input type="submit" class="finance_btn" value="SUBMIT">
                      </div>
                  </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Bar chart</h4>
                    <canvas id="MonthDataChart" style="height:230px"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Area chart</h4>
                    <canvas id="areaChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Doughnut chart</h4>
                    <canvas id="doughnutChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Pie chart</h4>
                    <canvas id="pieChart" style="height:250px"></canvas>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body"><br>
                    <h4 class="card-title">Let's go to Next Month</h4>
                    <h5>Monthly Data Transfer and Reset</h5>
                    <p> <code>Attention</code>: Pressing this button will transfer the current 
                      month's profit and expense data to the accounting book and 
                      initiate a new month's data collection. Please <code> ensure </code> all 
                      entries are accurate before proceeding. Thank you.</p>
                    <input type="button" id="push_accounting_data" class="finance_btn" value="Push Data">
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © Athena </span>
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
    <script src="../../assets/vendors/chart.js/Chart.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <script src="../../assets/js/settings.js"></script>
    <script src="../../assets/js/todolist.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="../../assets/js/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- End custom js for this page -->
  </body>
  <script>
    function validateAmount() {
        var amount = document.getElementById('amountInput').value;
        var errorLabel = document.getElementById('financialAmountError');
        
        if (amount.trim() === '') {
            errorLabel.innerHTML = 'Please enter the amount.';
        } else {
            errorLabel.innerHTML = '';
        }
    }
    
    function validateTransactionType() {
        var transactionType = document.getElementById('transactionTypeSelect').value;
        var errorLabel = document.getElementById('financialTypeError');
        
        if (transactionType.trim() === '') {
            errorLabel.innerHTML = 'Please select the transaction type.';
        } else {
            errorLabel.innerHTML = '';
        }
    }

    function validateDesc() {
    var description = document.getElementById('descInput').value;
    var errorLabel = document.getElementById('DescError');

    // Check if the description is empty
    if (description.trim() === '') {
        errorLabel.innerHTML = 'Please enter a description.';
        return;
    }

    // Check if the description contains only numbers
    if (/^\d+$/.test(description)) {
        errorLabel.innerHTML = 'Description cannot consist of only numbers.';
        return;
    }

    // If the description contains letters or a mix of letters and numbers, it's valid
    errorLabel.innerHTML = '';
}


    
    function validateForm() {
        validateAmount();
        validateTransactionType();
        validateDesc();

        // Check if any error messages are present
        var amountError = document.getElementById('financialAmountError').innerHTML;
        var typeError = document.getElementById('financialTypeError').innerHTML;
        var descError = document.getElementById('DescError').innerHTML;

        if (amountError || typeError || descError) {
            return false; // Prevent form submission
        }

        return true; // Allow form submission
    }
</script>
<script>
  $(document).ready(function(){
    // AJAX request to fetch ImagePath
    $.ajax({
        url: '../../fetch_image.php',
        type: 'GET',
        success: function(response){
            var base_image_url = "../Add Staff/assets/";
            var image_name = response;
            var full_image_url = base_image_url + image_name;
            $('.logo-mini').attr('src', full_image_url);
        },
        error: function(xhr, status, error){
            console.error(xhr.responseText);
        }
    });
});
</script>  
<script>
// AJAX request
$.ajax({
    url: 'chart_data.php', // Replace 'your_php_script.php' with the actual path to your PHP script
    type: 'GET', // Assuming you're using GET method in your PHP script
    dataType: 'json',
    success: function(response) {
        // Handle the response data here
        console.log(response);

        // Add a dummy dataset with a single data point at the end of the chart data
        response.labels.push('');
        const minValue = Math.min(...response.revenueData);
        const dummyValue = minValue * 0.7; // Set dummy value to be 70% of the minimum value
        response.revenueData.push(dummyValue);

        // Update chart data with fetched data
        updateChartData(response.labels, response.revenueData);
    },
    error: function(xhr, status, error) {
        // Handle errors here
        console.error(xhr.responseText);
    }
});

function updateChartData(labels, revenueData) {
    // Remove the last element from labels and revenueData arrays
    const lastLabel = labels.pop();
    const lastRevenue = revenueData.pop();

    // Insert the lastLabel and lastRevenue at the beginning of the arrays
    labels.unshift(lastLabel);
    revenueData.unshift(lastRevenue);

    const ctx = document.getElementById('MonthDataChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: '# Revenue',
                data: revenueData.slice(0), // Exclude the last data point for the dummy dataset
                backgroundColor: [
                    'rgba(0,0,0,0)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)'
                ],
                borderColor: [
                    'rgba(0,0,0,0)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255,99,132,1)'
                ],
                borderWidth: 1,
                barPercentage: 1.7, // Adjust the width of the bars
                categoryPercentage: 1 // Ensure the bars fill the category space
            }, {
                data: [revenueData[revenueData.length - 1]], // Add a dummy dataset with a single data point
                label: '',
                backgroundColor: 'rgba(0, 0, 0, 0)', // Set the background color to transparent
                borderColor: 'rgba(0, 0, 0, 0)', // Set the border color to transparent
                borderWidth: 0, // Set the border width to 0
                fill: false // Don't fill the bar
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: false
                }
            }
        }
    });
}

</script>
<script>
$(document).ready(function(){
    $('#push_accounting_data').click(function(){
        $.ajax({
            url: 'accounting.php', // Replace 'your_php_script.php' with the path to your PHP script
            type: 'POST',
            success: function(response) {
                alert('Data pushed successfully');
                // Optionally, you can perform additional actions after the data is pushed
            },
            error: function(xhr, status, error) {
                alert('Error occurred while pushing data');
                console.error(xhr.responseText);
            }
        });
    });
});
</script>

</html>
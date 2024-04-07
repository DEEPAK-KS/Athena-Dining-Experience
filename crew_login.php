<!-- Section: Design Block -->
<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<head>
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Login</title>
</head>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<style>
    body{
      font-family: "Open Sans", sans-serif;
      background: #0c0b09;
      color: white !important;
    }
    .sigin{
      color: #cda45e;
      font-weight: 600;
    }
    .text-body {
      font-family: "Playfair Display", serif;
      color: white !important;
    }
    input{
      border-radius: 0;
      box-shadow: none;
      font-size: 14px;
      background: #0c0b09;
      border-color: .5px solid #625b4b;
      width: 100%;
      outline:none;
      color: white;
    }

    input:focus {
      border: 2px solid #cda45e;
    }
    .btn{
      border: 2px solid #cda45e;
      color: white;
      border-radius: 30px;
      width: 100%;
    }
    .btn:hover{
      background-color: #cda45e;
    }
    .error{
      color: red;
    }

</style>
<?php
session_start();
if(isset($_SESSION['SuperAdmin'])){
    header('Location: admin/template/index.php');
}
else if(isset($_SESSION['admin'])){
  header('Location: admin/template/index.php');
}
else if(isset($_SESSION['staff'])) {
    header('Location: Staff/template/index.php'); 
}
?>
<body>
<?php
 if (isset($_SESSION['crew_error'])) {
  $message=$_SESSION['crew_error'];
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
    unset($_SESSION['crew_error']);
}
?>
<section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-md-9 col-lg-6 col-xl-5">
          <img src="assets/img/crew.webp"
            class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form action="crew_data.php" method="POST" onsubmit="return(staffvalidate())">
            <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
              <h2 class="sigin">Sign - In</h2>
            </div>
  
            <div class="divider d-flex align-items-center my-4">
              <p class="text-center fw-bold mx-3 mb-0"></p>
            </div>
            <!-- Email input -->
            <div class="form-outline mb-4">
              <input type="email" id="email-signin" name="email-signin" class="form-control-lg" placeholder="Enter a valid email address" onblur="siginemailValidate()">
              <label class="form-label error" id="email-signin-tag" for="form3Example3"></label>
            </div>
  
            <!-- Password input -->
            <div class="form-outline mb-3">
              <input type="password" id="password_reg" name="password_reg" class="form-control-lg" placeholder="Enter password" onblur="pswdvalidate()">
              <label class="form-label error" id="pswd-tag" for="form3Example4"></label>
            </div>
  
            <div class="d-flex justify-content-between align-items-center">
              <a href="index.php" class="text-body">Back Home</a>
              <a href="#!" class="text-body" onclick="getPassword()" >Forgot password?</a>
            </div>
  
            <div class="text-center text-lg-start mt-4 pt-2">
              <button type="submit" class="btn btn-lg" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
              <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!"
                  class="link-danger">Register</a></p>
            </div>
  
          </form>
        </div>
      </div>
    </div>
  </section>
  </body>
  <script src="assets/js/main-project.js"></script>
  <script>
    function pswdvalidate() {
    var password = document.getElementById("password_reg").value;
    var pswdTag = document.getElementById("pswd-tag");

    // Check for empty password
    if (!password.trim()) {
        pswdTag.style.display = "block";
        pswdTag.innerHTML = "Please enter a password.";
        return false;
    }

    // Check for minimum length
    if (password.length < 8) {
        pswdTag.style.display = "block";
        pswdTag.innerHTML = "Password must be at least 8 characters long.";
        return false;
    }

    // Check for spaces
    if (password.indexOf(' ') !== -1) {
        pswdTag.style.display = "block";
        pswdTag.innerHTML = "Password cannot contain spaces.";
        return false;
    }

    pswdTag.style.display = "none";
    return true;
}

    function staffvalidate(){
      if(!siginemailValidate()){
        return false;
      }
      if(!pswdvalidate()){
        return false;
      }
      return true;
    }
    function getPassword() {
        if (!siginemailValidate()) {
            return false;
        }
    
        var email = document.getElementById("email-signin").value;
        alert(email);
        // AJAX call using jQuery
        $.ajax({
            type: 'POST',
            url: 'set-staff-password.php',
            data: {
                email: email
            },
            dataType: 'json',
            success: function(response) {
                // Handle the response from the server
                if (response.success) {
                    let emailBody = `<h2>Click on the following link to reset your password:</h2>  ${response.resetLink}`;

                    // Send email using Email.js
                    Email.send({
                        SecureToken: "fb4b378e-6a9f-4acd-82fc-271c3e6442fc",
                        To: response.email,
                        From: "deepak.ks.sk.official@gmail.com",
                        Subject: "Password Reset - Athena",
                        Body: emailBody
                    }).then(
                        message => {
                            if (message === "OK") {
                                alert("Password reset instructions sent to your email.");
                            }
                        }
                    );
                } else {
                    alert('Error: ' + response.error);
                }
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error('AJAX Error: ' + status + ' - ' + error);
            }
        });
    }
    // Check if there is an error parameter in the URL
    const urlParams = new URLSearchParams(window.location.search);
    const error = urlParams.get('error');

    if (error) {
        // Show an error message using SweetAlert
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: decodeURIComponent(error),
        });
    }
  </script>
<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if (isset($_SESSION['userName'])) {
    header("Location: index.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <link href="assets/img/favicon.png" rel="icon">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Athena | Login Page</title>
</head>
<script src="https://smtpjs.com/v3/smtp.js"></script>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap');

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: "Open Sans", sans-serif;
    }

    body {
        background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("assets/img/login-bg.jpg");
        background-size: cover;
        background-repeat: no-repeat;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 100vh;
    }

    .container {
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
        border-radius: 30px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.35);
        position: relative;
        overflow: hidden;
        width: 768px;
        max-width: 100%;
        min-height: 480px;
    }

    .container p {
        font-size: 14px;
        line-height: 20px;
        letter-spacing: 0.3px;
        margin: 20px 0;
    }

    .container span {
        font-size: 12px;
    }

    .container a {
        color: #fff;
        font-size: 13px;
        text-decoration: none;
        margin: 15px 0 10px;
    }

    .container button {
        background-color: #cda45e;
        color: #fff;
        font-size: 12px;
        padding: 10px 45px;
        border: 1px solid transparent;
        border-radius: 8px;
        font-weight: 600;
        letter-spacing: 0.5px;
        text-transform: uppercase;
        margin-top: 10px;
        cursor: pointer;
    }

    .container button.hidden {
        background-color: transparent;
        border-color: white;
    }

    .container form {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 40px;
        height: 100%;
    }

    .container input {
        background-color: #0c0b09;
        border: 1px solid #aaaaaa;
        color: white;
        margin: 8px 0;
        padding: 10px 15px;
        font-size: 17px;
        border-radius: 8px;
        width: 100%;
        font-weight: 500;
        outline: none;
    }

    .container input:focus {
        border-color: #cda45e;
    }

    .form-container {
        position: absolute;
        top: 0;
        height: 100%;
        transition: all 0.6s ease-in-out;
    }

    .sign-in {
        left: 0;
        width: 50%;
        z-index: 2;
    }

    .container.active .sign-in {
        transform: translateX(100%);
    }

    .sign-up {
        left: 0;
        width: 50%;
        opacity: 0;
        z-index: 1;
    }

    .container.active .sign-up {
        transform: translateX(100%);
        opacity: 1;
        z-index: 5;
        animation: move 0.6s;
    }

    @keyframes move {

        0%,
        49.99% {
            opacity: 0;
            z-index: 1;
        }

        50%,
        100% {
            opacity: 1;
            z-index: 5;
        }
    }

    .social-icons {
        margin: 20px 0;
    }

    .social-icons a {
        border: 1px solid #cda45e;
        border-radius: 20%;
        display: inline-flex;
        justify-content: center;
        align-items: center;
        margin: 0 3px;
        width: 40px;
        height: 40px;
    }

    .toggle-container {
        position: absolute;
        top: 0;
        left: 50%;
        width: 50%;
        height: 100%;
        overflow: hidden;
        transition: all 0.6s ease-in-out;
        border-radius: 150px 0 0 100px;
        z-index: 1000;
    }

    .container.active .toggle-container {
        transform: translateX(-100%);
        border-radius: 0 150px 100px 0;
    }

    .toggle {
        background-color: orange;
        height: 100%;
        background: linear-gradient(to right, #f8a25c, #e1ec3c);
        color: #fff;
        position: relative;
        left: -100%;
        height: 100%;
        width: 200%;
        transform: translateX(0);
        transition: all 0.6s ease-in-out;
    }

    .container.active .toggle {
        transform: translateX(50%);
    }

    .toggle-panel {
        position: absolute;
        width: 50%;
        height: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        padding: 0 30px;
        text-align: center;
        top: 0;
        transform: translateX(0);
        transition: all 0.6s ease-in-out;
    }

    .toggle-left {
        transform: translateX(-200%);
    }

    .container.active .toggle-left {
        transform: translateX(0);
    }

    .toggle-right {
        right: 0;
        transform: translateX(0);
    }

    .container.active .toggle-right {
        transform: translateX(200%);
    }

    .error-msg {
        color: red;
        font-size: 15px;
    }

    .toggle img {
        width: 100px;
        height: auto;
        filter: invert(1);
        cursor: pointer;
    }

    .password-wrapper,
    .email_container {
        position: relative;
        width: 100%;
    }

    .show-password-label,
    .verify-email-label,
    .verified-email-label {
        cursor: pointer;
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translateY(-50%);
        padding: 5px 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .validate,
    .verify {
        opacity: 1;
        transition: opacity 0.5s ease-in-out;
        /* Added transition effect */
    }

    .hidden_prpty {
        display: none;
    }
</style>
<script src="https://accounts.google.com/gsi/client" async></script>

<body>
    <?php
    if (isset($_SESSION["dplt_email"])) {
        echo '<script>
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
                    icon: "error",
                    title: "Email Already Exists!"
                  });
    </script>';
        unset($_SESSION["dplt_email"]);
    }
    if (isset($_GET['error'])) {
        $errorMessage = htmlspecialchars(urldecode($_GET['error'])); // Ensure proper escaping
        echo '<script>
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
                    icon: "error",
                    title: "' . $errorMessage . '"
                  });
    </script>';
    }
    ?>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="POST" action="register.php" onsubmit="return(reg_validate())">
                <h1 style="color: #cda45e;">Create Account</h1>
                <div class="social-icons">
                    <a href="#" class="icon" style="color: red;"><i class="fa-brands fa-google-plus-g"></i></a>
                    <a href="#" class="icon" style="color: blue;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon" style="color: white;"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon" style="color: white;"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your Email for registeration</span>
                <input type="text" placeholder="Name" id="name" name="name" onblur="nameValidate()">
                <div id="name-tag" class="error-msg"></div>
                <!----------------------- Email verificatin ------------------>
                <div class="email_value hidden_prpty" onclick="change_email()"></div>
                <div class="email_container">
                    <div class="validate">
                        <input type="email" id="email" name="email_value" placeholder="Email" onblur="emailverify()">
                        <label class="verify-email-label">
                            <i class="bi bi-patch-check"></i>
                        </label>
                    </div>
                    <div class="verify hidden_prpty">
                        <input type="text" id="otp _entered_usr" name="otp">
                        <label class="verified-email-label" id="verify_email">
                            Verify
                        </label>
                    </div>
                </div>
                <div id="email-tag" class="error-msg"></div>

                <!-- Passweord space + Show password -->
                <div class="password-wrapper">
                    <input type="password" placeholder="Password" name="password_reg" id="password_reg" oninput="validatePassword()">
                    <label class="show-password-label" onclick="togglePassword()">
                        <i class="bi bi-sunglasses" id="passwordToggle"></i>
                    </label>
                </div>
                <div id="pswd-tag" class="error-msg"></div>

                <button type="submit" name="submit">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in" id="sign-in-form">
            <form action="store_sigin.php" method="POST" onsubmit="return(siginvalidate())">
                <h1 style="color: #cda45e;">Sign In</h1>
                <div class="social-icons">
                    <a href="#" class="icon" style="border:none">
                        <div id="g_id_onload" data-client_id="720675513902-q36jlvem987q58tdr9nr1png6v4dmfq3.apps.googleusercontent.com" data-context="signin" data-ux_mode="popup" data-login_uri="http://localhost/athena/" data-itp_support="true">
                        </div>
                        <div class="g_id_signin" data-type="icon" data-shape="square" data-theme="outline" data-text="signin_with" data-size="large" style="margin-bottom: 4px;">
                        </div>

                    </a>
                    <a href="#" class="icon" style="color: blue;"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="icon" style="color: white;"><i class="fa-brands fa-github"></i></a>
                    <a href="#" class="icon" style="color: white;"><i class="fa-brands fa-linkedin-in"></i></a>
                </div>
                <span>or use your Email & Password</span>
                <input type="email" placeholder="Email" id="email-signin" name="email-signin" onblur="siginemailValidate()">
                <div id="email-signin-tag" class="error-msg"></div>
                <div class="password-wrapper">
                    <input type="password" placeholder="Password" id="sigin_pswd" name="sigin_pswd" onblur="sigin_password()">
                    <label class="show-password-label" onclick="togglesiginPassword()">
                        <i class="bi bi-sunglasses" id="passwordToggle2"></i>
                    </label>
                </div>
                <div id="sigin-pswd-tag" class="error-msg"></div>
                <a href="#" onclick="getPassword()" style="cursor: pointer;">Forget Your Password?</a>
                <button type="submit" name="submit">Sign In</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <img src="logo.png" onclick="window.location.href='index.php'">
                    <h1>Welcome Back!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <img src="logo.png" onclick="window.location.href='index.php'">
                    <h1>Welcome, Friend!</h1>
                    <p>Enter your personal details to use all of site features</p>
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    const container = document.getElementById('container');
    const registerBtn = document.getElementById('register');
    const loginBtn = document.getElementById('login');

    registerBtn.addEventListener('click', () => {
        container.classList.add("active");
        document.getElementById("sign-in-form").hidden = true;
    });

    loginBtn.addEventListener('click', () => {
        container.classList.remove("active");
        document.getElementById("sign-in-form").hidden = false;

    });

    function togglePassword() {
        var passwordInput = document.getElementById("password_reg");
        var passwordToggleIcon = document.getElementById("passwordToggle");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggleIcon.classList.remove("bi-sunglasses");
            passwordToggleIcon.classList.add("bi-eyeglasses");
        } else {
            passwordInput.type = "password";
            passwordToggleIcon.classList.remove("bi-eyeglasses");
            passwordToggleIcon.classList.add("bi-sunglasses");
        }
    }

    function togglesiginPassword() {
        var passwordInput = document.getElementById("sigin_pswd");
        var passwordToggleIcon = document.getElementById("passwordToggle2");
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            passwordToggleIcon.classList.remove("bi-sunglasses");
            passwordToggleIcon.classList.add("bi-eyeglasses");
        } else {
            passwordInput.type = "password";
            passwordToggleIcon.classList.remove("bi-eyeglasses");
            passwordToggleIcon.classList.add("bi-sunglasses");
        }
    }
    chk_verified = true;

    function emailverify() {
        if (emailValidate() && chk_verified) {
            // Hide the validate div with a fade-out effect
            email_store = document.querySelector('.email_value');
            email_value = document.getElementById("email").value;
            verify_email_label = document.querySelector('.verify-email-label');
            email_store.style.display = "block";
            email_store.innerHTML = "<i class='bi bi-pencil-square'>" + email_value;
            validateDiv = document.querySelector('.validate');
            validateDiv.style.opacity = 0;

            // Show the verify div with a fade-in effect after a delay
            setTimeout(function() {
                validateDiv.style.display = 'none';
                verifyDiv = document.querySelector('.verify');
                verifyDiv.style.display = 'flex';
                verifyDiv.style.opacity = 1;
            }, 500); // 500 milliseconds delay (matches the transition duration)

            let otp_val = Math.floor(100000 + Math.random() * 900000);
            let emailbody = `<h2>Your OTP is </h2>  ${otp_val}`;
            Email.send({
                SecureToken: "fb4b378e-6a9f-4acd-82fc-271c3e6442fc",
                To: email_value,
                From: "deepak.ks.sk.official@gmail.com",
                Subject: "This is Athena",
                Body: emailbody
            }).then(
                message => {
                    if (message === "OK") {
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
                            title: "OTP send to you email " + email_value
                        });
                        verify_button = document.getElementById("verify_email");
                        verify_button.addEventListener('click', () => {
                            otp_input = document.getElementById("otp _entered_usr").value;
                            if (parseInt(otp_input) == otp_val) {
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
                                    title: 'Email Verified'
                                });
                                validateDiv.style.display = 'block';
                                verify_email_label.innerHTML = "<i class='bi bi-patch-check-fill'></i>";
                                verify_email_label.style.color = 'green';
                                validateDiv.style.opacity = 1;
                                verifyDiv.style.display = 'none';
                                verifyDiv.style.opacity = 0;
                                document.querySelector('.email_value').style.display = 'none';
                                chk_verified = false;
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
                                    title: 'Invalid OTP'
                                });
                            }
                        })
                    }
                }
            );
        }
        if (chk_verified) {
            return false;
        } else {
            return true;
        }
    }

    function sigin_password() {
        password = document.getElementById("sigin_pswd").value;
        if (!password.trim()) {
            document.getElementById("sigin-pswd-tag").innerHTML = "Please Enter password";
            return false;
        }
        return true;
    }

    function siginvalidate() {
        if (!siginemailValidate()) {
            return false;
        }
        if (!sigin_password()()) {
            return false;
        }
        return true;
    }

    function change_email() {
        validateDiv = document.querySelector('.validate');
        verifyDiv = document.querySelector('.verify');
        validateDiv.style.display = 'block';
        validateDiv.style.opacity = 1;
        verifyDiv.style.display = 'none';
        verifyDiv.style.opacity = 0;
        document.querySelector('.email_value').style.display = 'none';
    }

    function reg_validate() {
        if (!nameValidate()) {
            return false;
        }
        if (!emailverify()) {
            return false;
        }
        if (!validatePassword()) {
            return false;
        }
        return true;
    }

    function getPassword() {
        if (!siginemailValidate()) {
            return false;
        }

        var email = document.getElementById("email-signin").value;

        // AJAX call using jQuery
        $.ajax({
            type: 'POST',
            url: 'reset-password.php',
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
                                    title: 'Password reset instructions sent to your email'
                                });
                            }
                        }
                    );
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
                        icon: 'success',
                        title: 'Error: ' + response.error
                    });
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
          title: decodeURIComponent(error)
        });
    }
</script>
<script src="assets/js/main-project.js"></script>

</html>
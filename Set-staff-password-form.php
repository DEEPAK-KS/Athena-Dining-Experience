<?php
session_start();
if (!isset($_SESSION['chng_pswd'])) {
    header("Location: reset_jump.php");
    exit();
}
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <style>
        body {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url("assets/img/pswd_bg.jpg");
            background-size: cover;
            margin: 0;
            padding: 0;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .login-dark {
            height: 100vh;
            position: relative;
        }

        .login-dark form {
            max-width: 320px;
            width: 95%;
            background-color: #1e2833;
            padding: 20px;
            /* Adjusted height of the form */
            border-radius: 4px;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: #cda45e;
            box-shadow: 3px 3px 4px rgba(0, 0, 0, 0.2);
        }

        .login-dark .illustration {
            text-align: center;
            padding: 15px 0 15px;
            font-size: 100px;
            color: #cda45e;
        }

        .login-dark form .form-group {
            position: relative;
            margin-bottom: 20px;
        }

        .login-dark form .form-control {
            background: none;
            border: none;
            border-bottom: 1px solid #434a52;
            border-radius: 0;
            box-shadow: none;
            outline: none;
            color: inherit;
            padding: 10px 10px 5px 10px;
            transition: all 0.3s;
            margin-top: 10px;
        }

        .login-dark form .form-control:focus {
            border-bottom: 2px solid #cda45e;
        }

        .form-control:valid+label {
            transform: translateY(-20px);
        }

        .login-dark form .form-control:focus+label {
            transform: translateY(-20px);
            font-size: 14px;
            color: #cda45e;
        }

        .login-dark form label {
            position: absolute;
            top: 10px;
            left: 10px;
            color: #aaaaaa;
            font-size: 16px;
            pointer-events: none;
            transition: all 0.3s;
        }

        .login-dark form .btn-primary {
            background-color: inherit;
            border: 2px solid #cda45e;
            border-radius: 4px;
            padding: 11px;
            box-shadow: none;
            margin-top: 20px;
            text-shadow: none;
            outline: none;
            width: 100%;
        }

        .login-dark form .btn-primary:hover,
        .login-dark form .btn-primary:active {
            background: #cda45e;
            color: white;
            outline: none;
        }

        .login-dark form .forgot {
            display: block;
            text-align: center;
            font-size: 12px;
            color: #6f7a85;
            opacity: 0.9;
            text-decoration: none;
        }

        .login-dark form .forgot:hover,
        .login-dark form .forgot:active {
            opacity: 1;
            text-decoration: none;
        }

        .login-dark form .btn-primary:active {
            transform: translateY(1px);
        }

        .show-password-label i{
            position: relative !important;
            cursor: pointer;
            border: none;
            padding: 5px 10px 5px 10px;
            left: 40vh;
            top: 50%;
            width: fit-content;

        }

        .color_red {
            color: red;
        }
    </style>
</head>

<body>
    <div class="login-dark">
        <form action="#" method="POST" onsubmit="return(confirmPswd())">
            <!-- <h2 class="sr-only">Login Form</h2> -->
            <div class="illustration"><i class="icon ion-ios-locked-outline"></i></div>

            <!-- Password Input -->
            <div class="form-group">
                <div class="password-wrapper">
                    <input class="form-control" type="password" name="password_reg" id="password_reg" required oninput="validatePassword()" onblur="togglePassword();" onclick="togglePassword();">
                    <label>Password</label>
                    <label class="show-password-label">
                        <i class="bi bi-sunglasses" id="passwordToggle"></i>
                    </label>
                </div>
                <div id="pswd-tag" class="color_red"></div>
            </div>

            <!-- Confirm Password Input -->
            <div class="form-group">
                <input class="form-control" type="password" id="cnfrm_password" required oninput="confirmPasswords()">
                <label>Confirm Password</label>
                <div id="cnfrm-pswd-tag" class="color_red"></div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" name="submit">Set Password</button>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['submit'])) {
        include 'connect.php';

        $reset_user_id = $_SESSION['reset_user_id'];
        $newPassword = $_POST['password_reg']; // Replace with the actual form field or source of new password

        // SQL query to update the password based on User_ID
        $sql = "UPDATE staff SET Password ='$newPassword' WHERE StaffID = $reset_user_id;";
        $updateStmt = $conn->query($sql);
        if ($updateStmt) {
            $affectedRows = $conn->affected_rows;
            if ($affectedRows > 0) {
                echo '<script>
                Swal.fire({
                    title: "Password Updated",
                    icon: "success",
                    confirmButtonText: "Goto Home Page",
                }).then((result) => {
                    if (result.isConfirmed) {
                    window.location.href = "index.php";
                }
            });
                </script>';
                unset($_SESSION['chng_pswd']);
                echo json_encode(['success' => true, 'message' => 'Password updated successfully.']);
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                });
                </script>';
                echo json_encode(['success' => false, 'error' => 'No rows were affected.']);
            }
        } else {
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Double Oops...",
                text: "Something went wrong!",
            });
            </script>';
            echo json_encode(['success' => false, 'error' => 'Failed to update password.']);
        }

        // Close the database connection if needed
        $conn->close();
    }
    ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function confirmPasswords() {
            var password1 = document.getElementById('password_reg').value;
            var password2 = document.getElementById('cnfrm_password').value;

            if (password1 !== password2) {
                document.getElementById("cnfrm-pswd-tag").style.display = "block";
                document.getElementById("cnfrm-pswd-tag").innerHTML = "Password doesn't match";
                return false;
            }
            document.getElementById("cnfrm-pswd-tag").style.display = "none";
            // Continue with form submission if passwords match
            return true;
        }

        function confirmPswd() {
            if (!confirmPasswords()) {
                return false;
            }
            if (!validatePassword()) {
                return false;
            }
            return true;
        }

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
    </script>
</body>

</html>
<script src="assets/js/main-project.js"></script>
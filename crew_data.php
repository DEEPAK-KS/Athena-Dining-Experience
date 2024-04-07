<?php
session_start();
// Include the database connection file
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted email and password
    $email = $_POST["email-signin"];
    $password = $_POST["password_reg"];

    // Hash the password (Make sure you're using a secure hash function)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check the database for the user
    $query = "SELECT * FROM staff WHERE email = '$email';"; 
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['status'] == 0) {
            $_SESSION['crew_error'] = 'User Disabled';
            header("Location: crew_login.php");
            exit();
        }        
        // Verify the password
        if ($password==$row['Password']) {
            // Password is correct, redirect the user based on user type
            if ($row['UserType'] == 'admin') {
                $_SESSION['user_type'] = $row['UserType'];
                $_SESSION['admin']=$row['StaffID'];
                $_SESSION['staff_name'] = $row['FirstName'] . ' ' . $row['LastName'];
                header("Location: admin/template/index.php");
                exit();
            } elseif ($row['UserType'] == 'superAdmin') {
                $_SESSION['user_type'] = $row['UserType'];
                $_SESSION['SuperAdmin']=$row['StaffID'];
                $_SESSION['staff_name'] = $row['FirstName'] . ' ' . $row['LastName'];
                header("Location: admin/template/index.php");
                exit();
            }elseif ($row['UserType'] == 'staff') {
                $_SESSION['user_type'] = $row['UserType'];
                $_SESSION['staff']=$row['StaffID'];
                $_SESSION['staff_name'] = $row['FirstName'] . ' ' . $row['LastName'];
                header("Location: staff/template/index.php");
                exit();
            }
        }
        else{
            $_SESSION['crew_error']='Invalid Email or Password';
            header("Location: crew_login.php");
            exit();
        }
    }
    else{
        $_SESSION['crew_error']='Invalid Email or Password';
        header("Location: crew_login.php");
        exit();
    }
    // If the email or password is incorrect, redirect to an error page or display an error 
    
}
?>

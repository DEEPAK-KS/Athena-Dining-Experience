<?php
// Include the database connection file
include('connect.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve user input
    $email = $_POST["email-signin"];
    $password = $_POST["sigin_pswd"];

    // Perform a simple query (replace this with secure authentication methods)
    $sql = "SELECT User_id, Name FROM credentials WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);
    
    if ($result) {
        // Check if any rows were returned
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $_SESSION['userName'] = $row['Name'];
            $_SESSION['Email'] = $email;
            $_SESSION['userID'] = $row['User_id'];
            $_SESSION['login-alert']=1;
            header("Location: reset_jump.php");
            exit();
        } else {
            // Invalid credentials
            header("Location: login.php?error=Invalid%20email%20or%20password");
            exit();
        }
    } else {
        // Error in the query
        header("Location: login.php?error=Something%20went%20wrong");
        exit();
    }
}

// Close connection
$conn->close();
?>

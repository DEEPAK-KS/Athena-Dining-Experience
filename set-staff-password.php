<?php
include 'connect.php'; // Include the file with database connection details
session_start();
$_SESSION['chng_pswd']=1;
function generateToken($length = 32)
{
    return bin2hex(random_bytes($length));
}

// Check if the page is accessed directly or via AJAX
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle AJAX request
    $email = isset($_POST['email']) ? $_POST['email'] : null;
} else {
    // Handle direct access
       $token = isset($_GET['token']) ? $_GET['token'] : null;

       // Check if token is provided
       if (!$token) {
           // Handle the case where the token is not provided
           header("Location: http://localhost/athena/Error.html?error=Token not provided");
           exit();
       }
   
       // Verify the token against the database
       $sql = "SELECT StaffID, Email, reset_token_expiry FROM staff WHERE reset_token = '$token';";
       $result = $conn->query($sql);
       $row = $result->fetch_assoc();
   
       if (!$row) {
           // Handle the case where the token is not found in the database
           header("Location: http://localhost/athena/Error.html?error=Invalid token");
           exit();
       }
   
       $email = $row['Email'];
       $expiryTimestamp = strtotime($row['reset_token_expiry']);
   
       // Check if the token has expired
       if (time() > $expiryTimestamp) {
           // Handle the case where the token has expired
           header("Location: http://localhost/athena/Error.html?error=Token expired");
           exit();
       }
   
       // Store the user's ID in a session variable for subsequent password reset actions
       $_SESSION['reset_user_id'] = $row['StaffID'];
       //Redirect to a new page for the password reset form
       header("Location: http://localhost/athena/Set-staff-password-form.php");
       exit();
}

// Check if email is provided
if ($email && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $sql = "SELECT StaffID FROM staff WHERE Email = '$email';";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    // Check if user with provided email exists
    if ($row['StaffID']) {
        $resetToken = generateToken();
        $resetTokenExpiry = date('Y-m-d H:i:s', strtotime('+10 minutes'));

        // Update database with reset token and expiry
        $updateStmt = $conn->prepare("UPDATE staff SET reset_token = ?, reset_token_expiry = ? WHERE Email = ?");
        $updateStmt->bind_param("sss", $resetToken, $resetTokenExpiry, $email);
        $updateStmt->execute();

        // Construct the reset link with token and email for XAMPP localhost
        $resetLink = "http://localhost/athena/set-staff-password.php?token=$resetToken&email=$email";

        // Check if the page is accessed via AJAX
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // If it's an AJAX request, include reset link in the response
            echo json_encode(['success' => true, 'resetLink' => $resetLink, 'email' => $email]);
        }
    } 
    else {
        // Return an error response in JSON format or redirect with an error
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo json_encode(['success' => false, 'error' => 'Email not found']);
        }
    }
    }
    else {
    // Handle the case where email is not provided
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        echo json_encode(['success' => false, 'error' => 'Email not provided']);
    }
}

// Close the database connection
$conn->close();
?>

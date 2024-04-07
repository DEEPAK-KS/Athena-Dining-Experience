<?php
// Include database connection
include 'connect.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve new password from POST data
    $newPassword = $_POST['new_password'];

    // Start session
    session_start();

    // Retrieve user ID from session
    $userID = $_SESSION['userID']; // Assuming you have session management

    // Prepare update query
    $query = "UPDATE credentials SET Password = '$newPassword' WHERE User_ID = $userID";

    // Execute update query
    if (mysqli_query($connection, $query)) {
        // Password updated successfully
        echo json_encode(array("success" => true));
    } else {
        // Error updating password
        echo json_encode(array("error" => "Error updating password: " . mysqli_error($connection)));
    }
} else {
    // Invalid request method
    echo json_encode(array("error" => "Invalid request method"));
}

// Close connection
mysqli_close($connection);
?>

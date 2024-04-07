<?php
// Include database connection or any necessary files
include 'connect.php';

// Start session
session_start();

// Check if user is logged in and retrieve staff ID from session
if(isset( $_SESSION['staff'])){
    $staffID = $_SESSION['staff'];
} 

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if new password is set and not empty
if (isset($_POST['new_password'])) {
    $newPassword = sanitize_input($_POST['new_password']);

    // Basic validation - ensure password is not empty
    if (empty($newPassword)) {
        echo json_encode(array("status" => "error", "message" => "New password cannot be empty"));
        exit();
    }

    // Prepare and bind update statement
    $stmt = $conn->prepare("UPDATE staff SET Password = ? WHERE StaffID = ?");
    $stmt->bind_param("si", $newPassword, $staffID);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo json_encode(array("status" => "success", "message" => "Password updated successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error updating password: " . $conn->error));
    }

    // Close statement
    $stmt->close();
} else {
    echo json_encode(array("status" => "error", "message" => "New password not provided"));
}

// Close connection
$conn->close();
?>

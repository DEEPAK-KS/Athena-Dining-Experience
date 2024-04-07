<?php
include 'connect.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have already sanitized and validated the input
    $staffID = $_POST['staffID'];

    // Query to fetch the UserType based on StaffID
    $sql = "SELECT UserType FROM staff WHERE StaffID = $staffID ";

    // Assuming you are using PDO for database operations
    $result = $conn->query($sql);

    // Fetch the UserType
    $row= $result ->fetch_assoc();
    $userType=$row['UserType'];
    // Return 'admin' if UserType is admin, otherwise return 'staff'
    if ($userType === 'admin') {
        echo 'admin';
    } elseif ($userType === 'staff') {
        echo 'staff';
    } else {
        echo 'unknown';
    }
} 
?>

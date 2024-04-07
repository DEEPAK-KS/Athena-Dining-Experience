<?php
session_start();
// Include your database connection file if needed
include 'connect.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming you have already sanitized and validated the input
    $staffID = $_POST['staff_promotion_ID'];

    // Query to fetch the UserType based on StaffID
    $sql = "SELECT UserType FROM staff WHERE StaffID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $staffID);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $userType = $row['UserType'];

    // Toggle the UserType and update the database
    if ($userType === 'admin') {
        $_SESSION['delete_success'] = 'User Demoted';
        $newUserType = 'staff';
    } elseif ($userType === 'staff') {
        $_SESSION['delete_success'] = 'User Promoted';
        $newUserType = 'admin';
    }

    // Update the UserType in the database
    $updateSql = "UPDATE staff SET UserType = ? WHERE StaffID = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("si", $newUserType, $staffID);
    $updateStmt->execute();

    // Redirect back to the previous page or wherever you want after the update
    header("Location: Staff.php");
    exit();
} else {
    // Redirect if accessed directly without POST request
    $_SESSION['staff_error'] = 'Error Occurred';
    header("Location: Staff.php");
    exit();
}
?>

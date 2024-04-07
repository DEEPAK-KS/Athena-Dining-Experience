<?php
include 'connect.php';

// Fetch user details from the database based on the logged-in user's credentials
session_start(); // Start session
$userID = $_SESSION['userID']; // Assuming you have session management

// Prepare and execute query
$query = "SELECT Name AS FullName, Email FROM credentials WHERE User_ID = $userID";
$result = mysqli_query($conn, $query);

if (!$result) {
    // Handle database query error
    $error = "Error fetching user details: " . mysqli_error($connection);
    echo json_encode(array("error" => $error));
    exit; // Stop script execution
}

// Fetch user data
$row = mysqli_fetch_assoc($result);

// Check if user data is found
if (!$row) {
    // Handle user not found
    $error = "User details not found";
    echo json_encode(array("error" => $error));
    exit; // Stop script execution
}

// Close connection
mysqli_close($conn);

// Return user data as JSON
header('Content-Type: application/json');
echo json_encode($row);
?>

<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['userID'])) {
    echo "User is not logged in.";
    exit; // Exit script
}

include 'connect.php';

// Prepare a DELETE statement
$sql = "DELETE FROM bill WHERE UsrID = ?";

// Bind the parameter
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $_SESSION['userID']); // Bind userID from session
    $stmt->execute();
    $stmt->close();
    echo "Rows deleted successfully.";
} else {
    echo "Error deleting rows: " . $mysqli->error;
}

$conn->close();
?>

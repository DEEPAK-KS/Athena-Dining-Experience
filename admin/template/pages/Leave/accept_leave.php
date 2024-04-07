<?php
include 'connect.php';
// Retrieve staffId from POST data
$staffId = $_POST['staffId'];

// Prepare and execute UPDATE query to change leave status
$query = "UPDATE staffleavedetails SET LeaveStatus = 'Approved' WHERE StaffId = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $staffId);
$stmt->execute();

// Check if update was successful
if ($stmt->affected_rows > 0) {
    echo "Leave request approved successfully";
} else {
    echo "Failed to approve leave request";
}

// Close statement and connection
$stmt->close();
$conn->close();
?>

<?php
include 'connect.php';

// SQL query to fetch leave details
$sql = "SELECT StaffName, StaffId, StartDate, EndDate, Type, Reason, LeaveStatus, Image FROM StaffLeaveDetails";

$result = $conn->query($sql);

// Fetch data as associative array
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close connection
$conn->close();

// Send data as JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>

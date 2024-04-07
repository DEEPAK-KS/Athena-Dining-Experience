<?php
include 'connect.php';
session_start();
$id=$_SESSION['staff'];
// SQL query to fetch leave details
$sql = "SELECT StaffName, StartDate, EndDate, Type, Reason, LeaveStatus, Image FROM StaffLeaveDetails where StaffId = $id";

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

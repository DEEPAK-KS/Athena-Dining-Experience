<?php
include 'connect.php';
session_start();
$id = $_SESSION['staff'];

// Prepare and bind SQL statement
$sql = "SELECT LeaveStatusId, StaffName, StaffId, StartDate, EndDate, Type, Reason, LeaveStatus, Image FROM StaffLeaveDetails WHERE StaffId = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);

// Execute query
$stmt->execute();
$result = $stmt->get_result();

// Fetch data as associative array
$data = array();
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
}

// Close statement and connection
$stmt->close();
$conn->close();

// Send data as JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>

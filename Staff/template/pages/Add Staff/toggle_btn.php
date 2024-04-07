<?php
include 'connect.php';

// Retrieve staff_input and staff_ID from AJAX POST request
$staffID = $_POST['staff_ID'];

// Construct SQL query to fetch status
$sql = "SELECT status FROM staff WHERE StaffID = $staffID";
$result = $conn->query($sql);

// Check if the query was successful and if at least one row was returned
if ($result && $result->num_rows > 0) {
    // Fetch the row and store the status into $status variable
    $row = $result->fetch_assoc();
    $status = $row['status'];
} else {
    // If no rows were returned or if there was an error in the query, set status to a default value
    $status = "Status not found";
}

// Close connection
$conn->close();

// Return status as response to AJAX request
echo $status;
?>

<?php
include 'connect.php';
// Query to fetch data from the staffleavedetails table
$query = "SELECT LeaveStatusId, StaffName, StaffId, StartDate, EndDate, Type, Reason, LeaveStatus, Image FROM staffleavedetails where LeaveStatus = 'Pending'";

// Perform the query
$result = mysqli_query($conn, $query);

// Initialize an empty array to store the fetched data
$data = array();

// Fetching data row by row
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Free result set
mysqli_free_result($result);

// Close the database connection
mysqli_close($conn);

// Return the fetched data in JSON format
echo json_encode($data);
?>

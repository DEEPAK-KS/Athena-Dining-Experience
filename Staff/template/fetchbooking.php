<?php
include 'connect.php';

// Select all rows from the bill table
$sql = "SELECT * FROM booking_details";
$result = $conn->query($sql);

// Check if there are rows in the result
if ($result && $result->num_rows > 0) {
    // Fetch the result as an associative array
    $rows = array();
    while ($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }

    // Encode the array as JSON and return it
    header('Content-Type: application/json');
    echo json_encode($rows);
} else {
    // No rows found or an error occurred
    http_response_code(500); // Internal Server Error
    echo json_encode(array('error' => 'Unable to fetch data.'));
}

// Close the database connection
$conn->close();
?>

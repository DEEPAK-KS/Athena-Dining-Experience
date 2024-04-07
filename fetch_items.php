<?php
include 'connect.php';

// Fetch data from the database
$sql = "SELECT Name, Qty FROM bill"; 
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        $data[] = array('name' => $row['Name'], 'quantity' => $row['Qty']);
    }
}

// Close the database connection
$conn->close();

// Return the data in JSON format
header('Content-Type: application/json');
echo json_encode($data);
?>

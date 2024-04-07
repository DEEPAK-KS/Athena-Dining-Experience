<?php
include 'connect.php';

$selectedOption = $_POST['selectedOption'];

// Extract first and last names from the selected option
$selectedNames = explode(' ', $selectedOption);
$selectedFirstName = $selectedNames[0];
$selectedLastName = end($selectedNames);

// Query to fetch the staff ID based on the first and last name
$query = "SELECT StaffID, FirstName, LastName FROM staff WHERE CONCAT(FirstName, ' ', LastName) = '$selectedOption'";

$result = mysqli_query($conn, $query);

if ($result) {
    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $staffID = $row['StaffID'];
        
        // Return the staff ID as JSON
        echo json_encode(['StaffID' => $staffID]);
    } else {
        // If no exact match is found, try to match only the first name and last name separately
        $query = "SELECT StaffID, FirstName, LastName FROM staff WHERE FirstName = '$selectedFirstName' AND LastName = '$selectedLastName'";
        $result = mysqli_query($conn, $query);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $staffID = $row['StaffID'];
            
            // Return the staff ID as JSON
            echo json_encode(['StaffID' => $staffID]);
        } else {
            // Return an error message if no match is found
            echo json_encode(['error' => 'No matching staff found']);
        }
    }
} else {
    // Return an error message if the query fails
    echo json_encode(['error' => 'Failed to retrieve staff ID']);
}

mysqli_close($conn);
?>

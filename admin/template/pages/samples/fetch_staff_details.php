<?php
session_start(); // Start the session
include 'connect.php';

// Fetch staff details based on provided full name
if(isset($_POST['fullName'])) {
    $fullName = $_POST['fullName'];

    // Prepare and bind parameters to avoid SQL injection
    $stmt = $conn->prepare("SELECT * FROM staff WHERE CONCAT(FirstName, ' ', LastName) = ?");
    $stmt->bind_param("s", $fullName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Output data of the first row
        $row = $result->fetch_assoc();
        
        // Store the StaffID in a session variable
        $_SESSION['current_staffID'] = $row['StaffID'];

        // Encode the data as JSON and return it
        echo json_encode($row);
    } else {
        echo "0 results";
    }
    $stmt->close();
}

$conn->close();
?>

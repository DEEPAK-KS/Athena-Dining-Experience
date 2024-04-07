<?php
// Retrieve the data sent via POST request
$data = json_decode(file_get_contents('php://input'), true);
session_start();

// Check if the message is not empty
if(isset($data['message']) && !empty($data['message'])) {
    // Establish connection to the database
    include 'connect.php';

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare the statement to insert the message into the database
    $stmt = $conn->prepare("INSERT INTO messageTable (Message, StaffID) VALUES (?, ?)");
    
    // Bind parameters
    $stmt->bind_param("si", $data['message'], $_SESSION['staff']);
    
    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo "Message sent successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Close the statement and connection
    $stmt->close();
    $conn->close();
} else {
    // If message is empty, return an error message
    echo "Error: Message cannot be empty!";
}
?>

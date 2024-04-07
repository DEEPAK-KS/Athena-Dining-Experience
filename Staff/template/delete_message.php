<?php
// Include database connection
include 'connect.php';

// Check if message ID is provided via POST request
if(isset($_POST['message_id'])) {
    // Prepare SQL statement to delete the message
    $sql = "DELETE FROM MessageTable WHERE MessageID = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute the statement
    $stmt->bind_param("i", $_POST['message_id']);
    if ($stmt->execute()) {
        // If deletion is successful, return success message
        echo json_encode(array("success" => true));
    } else {
        // If deletion fails, return error message
        echo json_encode(array("success" => false, "error" => "Error deleting message"));
    }
    
    // Close the prepared statement
    $stmt->close();
} else {
    // If message ID is not provided, return error message
    echo json_encode(array("success" => false, "error" => "Message ID not provided"));
}

// Close the database connection
$conn->close();
?>

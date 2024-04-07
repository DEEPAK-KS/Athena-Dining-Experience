<?php
// Start the session (if not already started)
session_start();

// Include database connection
include 'connect.php';

// Check if staff ID is set in the session
if(isset($_SESSION['staff'])) {
    // Fetch messages from the database with calculated time difference
    $sql = "SELECT MessageID, staffID, message, datetime, TIMESTAMPDIFF(SECOND, datetime, NOW()) AS time_difference FROM MessageTable where StaffID = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute the statement
    $stmt->bind_param("i", $_SESSION['staff']);
    $stmt->execute();
    
    // Get the result
    $result = $stmt->get_result();

    // Prepare an array to store messages
    $messages = array();

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Loop through each row
        while($row = $result->fetch_assoc()) {
            // Format time difference as a human-readable string
            $time_difference = formatTimeDifference($row['time_difference']);

            // Add message details to the array
            $message = array(
                'message_id' => $row['MessageID'],
                'staff_name' => $row['staffID'],
                'message' => $row['message'],
                'datetime' => $row['datetime'],
                'time_difference' => $time_difference
            );
            $messages[] = $message;
        }
    }

    // Close the prepared statement
    $stmt->close();
} else {
    // If staff ID is not set in the session, handle the situation accordingly
    // For example, redirect to a login page
}

// Close the database connection
$conn->close();

// Output messages as JSON
header('Content-Type: application/json');
echo json_encode($messages);

// Function to format time difference as a human-readable string
function formatTimeDifference($time_difference) {
    if ($time_difference < 60) {
        return $time_difference . " seconds ago";
    } elseif ($time_difference < 3600) {
        $minutes = floor($time_difference / 60);
        return $minutes . " minutes ago";
    } else {
        $hours = floor($time_difference / 3600);
        return $hours . " hours ago";
    }
}
?>

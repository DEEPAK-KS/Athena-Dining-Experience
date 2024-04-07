<?php
// Include database connection
include 'connect.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve leave ID from POST data
    $leaveID = $_POST['leave_id'];

    // Sanitize the leave ID (optional, but recommended)
    $leaveID = intval($leaveID);

    // Prepare and execute query to delete the leave entry
    $query = "DELETE FROM StaffLeaveDetails WHERE LeaveStatusId = $leaveID";

    if (mysqli_query($conn, $query)) {
        // Leave cancelled successfully
        echo json_encode(array("success" => true));
    } else {
        // Error cancelling leave
        $errorMessage = "Error cancelling leave: " . mysqli_error($connection);
        echo json_encode(array("error" => $errorMessage));
        
        // Log the error message to the browser console
        echo '<script>console.error("' . $errorMessage . '");</script>';
    }
} else {
    // Invalid request method
    $errorMessage = "Invalid request method";
    echo json_encode(array("error" => $errorMessage));
    
    // Log the invalid request method to the browser console
    echo '<script>console.error("' . $errorMessage . '");</script>';
}

// Close connection
mysqli_close($conn);
?>

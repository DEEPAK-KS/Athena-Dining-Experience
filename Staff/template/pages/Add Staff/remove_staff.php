<?php
include 'connect.php';

session_start();

// Check if staff ID is provided
if (isset($_POST['staff_ID']) && !empty($_POST['staff_ID'])) {
    $staffID = $_POST['staff_ID'];

    // Query to retrieve the current status of the staff member
    $query = "SELECT status FROM staff WHERE StaffID = '$staffID'";
    
    // Execute the query
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $currentStatus = $row['status'];

            // Toggle status (if 1, change to 0; if 0, change to 1)
            $newStatus = ($currentStatus == 1) ? 0 : 1;

            // Query to update the status
            $updateQuery = "UPDATE staff SET status = '$newStatus' WHERE StaffID = '$staffID'";
            
            // Execute the update query
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                $_SESSION['delete_success'] = ($newStatus == 1) ? 'Staff member enabled successfully' : 'Staff member disabled successfully';
            } else {
                $_SESSION['staff_error'] = 'Failed to update staff member status';
            }
        } else {
            $_SESSION['staff_error'] = 'No staff member found with provided ID';
        }
    } else {
        $_SESSION['staff_error'] = 'Database error';
    }
} else {
    $_SESSION['staff_error'] = 'Staff ID must be provided';
}

// Redirect back to Staff.php
if(isset($_SESSION['admin'])){
    header('Location:Staff_1.php');
  }
else if(isset($_SESSION['SuperAdmin'])){
    header('location:staff.php');
  }

// Close the database connection
mysqli_close($conn);
?>

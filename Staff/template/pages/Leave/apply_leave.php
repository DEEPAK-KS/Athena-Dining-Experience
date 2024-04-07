<?php
// Include the connection script
include 'connect.php';

// Start the session
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $startdate = $_POST['startdate'];
    $enddate = $_POST['enddate'];
    $reason = $_POST['reason'];
    $type = $_POST['type'];
    
    // Validate form data (you can implement validation as per your requirements)

    // Process the data further (e.g., store it in the database)

    try {
        // Prepare SQL statement to insert leave application into the database
        $sql = "INSERT INTO staffleavedetails (StaffId, StaffName, StartDate, EndDate, Type, Reason, Image) VALUES ('".$_SESSION['staff']."', '".$_SESSION['staff_name']."', '".$startdate."', '".$enddate."', '".$type."', '".$reason."', '".$_SESSION['imagePath']."')";

        // Execute the statement
        $conn->query($sql);
        $_SESSION['leave_applied']=1;
        // Redirect to a success page or display a success message
        header("Location: leave.php");
        exit();
    } catch (mysqli_sql_exception $e) {
        // Handle database errors
        $_SESSION['leave_error']=1;
        echo "Error: " . $e->getMessage();
    }
} else {
    $_SESSION['leave_error']=1;
    // If the form is not submitted, redirect to the form page
    header("Location: leave.php");
    exit();
}
?>

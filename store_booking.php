<?php
include 'connect.php';
// Start session to access session variables
session_start();

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Get form data
    $name = $_POST['name'];
    $_SESSION['booking_name'] = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $date = $_POST['date'];
    $_SESSION['booking_date'] = $_POST['date'];
    $num_of_guests = $_POST['people'];
    $table_name = $_POST['seat'];
    $_SESSION['table_name'] = $_POST['seat'];
    $booking_time = $_POST['SelectedTimeSlot']; 
    $_SESSION['booking_time'] = $_POST['SelectedTimeSlot']; 

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO booking_details (customer_id, customer_name, email, phone, num_of_guests, table_name, booking_time, booking_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isssisss", $_SESSION['userID'], $name, $email, $phone, $num_of_guests, $table_name, $booking_time, $date);
    
    // Execute SQL statement
    if ($stmt->execute()) {
        $_SESSION['booking_status']=1;
        header('Location: Booking.php#menu');
    } else {
        $_SESSION['booking_error'];
    }
    
    // Close prepared statement
    $stmt->close();
}
?>

<?php
include 'connect.php';

// Get the number of bookings for this month
$currMonth = date('Y-m');
$sqlCurrMonth = "SELECT COUNT(*) AS bookingCount FROM booking_details WHERE DATE_FORMAT(booking_date, '%Y-%m') = '$currMonth'";
$resultCurrMonth = $conn->query($sqlCurrMonth);
$rowCurrMonth = $resultCurrMonth->fetch_assoc();
$bookingCount = $rowCurrMonth['bookingCount'];

// Get the number of bookings for last month
$lastMonth = date('Y-m', strtotime('-1 month'));
$sqlLastMonth = "SELECT COUNT(*) AS bookingCount FROM booking_details WHERE DATE_FORMAT(booking_date, '%Y-%m') = '$lastMonth'";
$resultLastMonth = $conn->query($sqlLastMonth);
$rowLastMonth = $resultLastMonth->fetch_assoc();
$lastMonthBookingCount = $rowLastMonth['bookingCount'];

// Calculate percentage change
$percentageChange = 0;
if ($lastMonthBookingCount != 0) {
    $percentageChange = (($bookingCount - $lastMonthBookingCount) / $lastMonthBookingCount) * 100;
}

// Prepare the data to be returned as JSON
$response = array(
    'bookingCount' => $bookingCount,
    'percentageChange' => round($percentageChange, 2)
);

// Close the database connection
$conn->close();

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);
?>

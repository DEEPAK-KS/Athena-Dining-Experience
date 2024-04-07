<?php
include 'connect.php'; // Assuming this file contains your database connection details and sets up $conn

// Assuming your table name is "RestaurantReservations" and it has a column named "Reservation_Date"
$currentMonthCountQuery = "SELECT COUNT(*) AS count FROM RestaurantReservations WHERE MONTH(Reservation_Date) = MONTH(CURRENT_DATE()) AND YEAR(Reservation_Date) = YEAR(CURRENT_DATE())";
$lastMonthCountQuery = "SELECT COUNT(*) AS count FROM RestaurantReservations WHERE MONTH(Reservation_Date) = MONTH(CURRENT_DATE() - INTERVAL 1 MONTH) AND YEAR(Reservation_Date) = YEAR(CURRENT_DATE() - INTERVAL 1 MONTH)";

// Execute queries and fetch counts
$currentMonthCountResult = $conn->query($currentMonthCountQuery);
$lastMonthCountResult = $conn->query($lastMonthCountQuery);

$currentMonthCountRow = $currentMonthCountResult->fetch_assoc();
$lastMonthCountRow = $lastMonthCountResult->fetch_assoc();

$currentMonthCount = $currentMonthCountRow['count'];
$lastMonthCount = $lastMonthCountRow['count'];

// Calculate difference and percentage increase
$difference = $currentMonthCount - $lastMonthCount;
$percentageIncrease = ($difference / $lastMonthCount) * 100;

$reservationStats = array(
    'difference' => $difference,
    'percentageIncrease' => $percentageIncrease
);

header('Content-Type: application/json');
echo json_encode($reservationStats);
?>

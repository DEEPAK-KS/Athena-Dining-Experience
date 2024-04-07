<?php
include 'connect.php';

// Query to fetch the total profit for today
$queryToday = "SELECT SUM(Amount) AS totalProfitToday FROM Profits WHERE DATE(Date) = CURDATE();";
$resultToday = mysqli_query($conn, $queryToday);
$rowToday = mysqli_fetch_assoc($resultToday);
$totalProfitToday = isset($rowToday['totalProfitToday']) ? floatval($rowToday['totalProfitToday']) : 0;

// Query to fetch the total profit for the previous day
$queryYesterday = "SELECT SUM(Amount) AS totalProfitYesterday FROM Profits WHERE DATE(Date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
$resultYesterday = mysqli_query($conn, $queryYesterday);
$rowYesterday = mysqli_fetch_assoc($resultYesterday);
$totalProfitYesterday = isset($rowYesterday['totalProfitYesterday']) ? floatval($rowYesterday['totalProfitYesterday']) : 0;

// Calculate potential growth (difference)
$potentialGrowth = $totalProfitToday - $totalProfitYesterday;
// Calculate percentage difference
$percentageDifference = ($totalProfitYesterday != 0) ? (($totalProfitToday - $totalProfitYesterday) / $totalProfitYesterday) * 100 : 0;

// Create a JSON response array including potential growth and percentage difference
$response = array(
    'potentialGrowth' => $potentialGrowth,
    'percentageDifference' => $percentageDifference
);

// Send the JSON response
header('Content-Type: application/json');
echo json_encode($response);

// Close the database connection
mysqli_close($conn);


?>
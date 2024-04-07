<?php
include 'connect.php';

$startDate = date('Y-m-01', strtotime('last month'));
$endDate = date('Y-m-t', strtotime('last month'));

// Fetch income of the last month from 'financialdata' table
$queryIncome = "SELECT Income FROM financialdata WHERE Date BETWEEN '$startDate' AND '$endDate'";
$resultIncome = $conn->query($queryIncome);

// Calculate the total income of the last month
$totalIncome = 0;
while ($rowIncome = $resultIncome->fetch_assoc()) {
    $totalIncome += $rowIncome['Income'];
}
// Fetch total amount from 'profits' table
$resultAmount = $conn->query("SELECT SUM(Amount) AS totalAmount FROM profits");
$rowAmount = $resultAmount->fetch_assoc();
$totalAmount = $rowAmount['totalAmount'];

// Calculate the difference and difference percentage
$difference =  $totalAmount - $totalIncome ;
$percentage = ($difference / $totalIncome) * 100;

// Respond with JSON containing only the difference percentage
header('Content-Type: application/json');
echo json_encode([
    'success' => true,
    'percentage' => $percentage
]);
?>

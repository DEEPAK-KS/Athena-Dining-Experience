<?php
include 'connect.php';

// Fetch sum of amount from expenses table
$query = "SELECT SUM(Amount) AS totalExpense FROM expenses";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$expenseSum = floatval($row['totalExpense']);

// Fetch expenses of last month from financialdata table
$currentMonth = date('Y-m');
$lastMonth = date('Y-m', strtotime('-1 month'));
$query = "SELECT Expense FROM financialdata WHERE Date LIKE '$lastMonth%'";
$result = mysqli_query($conn, $query);
$lastMonthExpense = 0;
while ($row = mysqli_fetch_assoc($result)) {
    $lastMonthExpense += floatval($row['Expense']);
}

// Calculate percentage increase/decrease
$percentageChange = (($expenseSum - $lastMonthExpense) / $lastMonthExpense) * 100;

// Prepare data to be returned as JSON
$data = array(
    'percentageChange' => $percentageChange
);

// Return JSON response
header('Content-Type: application/json');
echo json_encode($data);
?>

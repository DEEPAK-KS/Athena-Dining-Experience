<?php
include 'connect.php';

// Calculate last month's start and end dates
$startDate = date('Y-m-d', strtotime('first day of last month'));
$endDate = date('Y-m-d', strtotime('last day of last month'));

// Query to calculate income and expenses for last month
$incomeExpenseQuery = "SELECT Income AS income, Expense AS expense FROM financialdata WHERE Date BETWEEN '$startDate' AND '$endDate'";
$incomeExpenseResult = mysqli_query($conn, $incomeExpenseQuery);
$incomeExpenseRow = mysqli_fetch_assoc($incomeExpenseResult);
$totalIncome = $incomeExpenseRow['income'];
$totalExpense = $incomeExpenseRow['expense'];

// Query to calculate profit for last month
$profitQuery = "SELECT SUM(Amount) AS total_profit FROM profits";
$profitResult = mysqli_query($conn, $profitQuery);
$profitRow = mysqli_fetch_assoc($profitResult);
$totalProfit = $profitRow['total_profit'];

// Query to calculate expenses for last month
$expenseQuery = "SELECT SUM(Amount) AS total_expense FROM expenses";
$expenseResult = mysqli_query($conn, $expenseQuery);
$expenseRow = mysqli_fetch_assoc($expenseResult);
$totalExpenseFromTable = $expenseRow['total_expense'];

// Calculate the difference between income and expense of financial data of last month
$previousMonth = $totalIncome - $totalExpense;

// Subtract profit and expense amount from the difference
$currentMonth = $totalProfit - $totalExpenseFromTable;
$finalResult =  $currentMonth - $previousMonth ;
// Calculate the percentage difference
if ($previousMonth != 0) {
    $percentageDifference = (($currentMonth - $previousMonth) / $previousMonth) * 100;
} else {
    $percentageDifference = 0;
}

// Output the result as JSON
echo json_encode(array('finalResult' => $finalResult, 'percentageDifference' => $percentageDifference));

?>

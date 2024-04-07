<?php

include 'connect.php';

// Fetch sum of amounts from expenses table
$sqlExpenses = "SELECT SUM(Amount) AS totalExpenses FROM expenses";
$resultExpenses = mysqli_query($conn, $sqlExpenses);
$rowExpenses = mysqli_fetch_assoc($resultExpenses);
$totalExpenses = $rowExpenses['totalExpenses'];

// Fetch sum of amounts from profit table
$sqlProfit = "SELECT SUM(Amount) AS totalProfit FROM profits";
$resultProfit = mysqli_query($conn, $sqlProfit);
$rowProfit = mysqli_fetch_assoc($resultProfit);
$totalProfit = $rowProfit['totalProfit'];

// Calculate revenue
$revenue = $totalProfit - $totalExpenses;

// Fetch current month and year
$currentMonth = date('m');
$currentYear = date('Y');

// Check if data for current month already exists in financialdata table
$sqlCheckExistingData = "SELECT * FROM financialdata WHERE MONTH(Date) = $currentMonth AND YEAR(Date) = $currentYear";
$resultCheckExistingData = mysqli_query($conn, $sqlCheckExistingData);
if(mysqli_num_rows($resultCheckExistingData) > 0) {
    // Data for current month already exists, update expense, revenue, and profit
    
    $sqlUpdateData = "UPDATE financialdata SET Expense = Expense + $totalExpenses, Revenue = Revenue + $revenue,  Income = Income + $totalProfit  WHERE MONTH(Date) = $currentMonth AND YEAR(Date) = $currentYear";   
    mysqli_query($conn, $sqlUpdateData);
} else {
    // Data for current month doesn't exist, insert new data
    $sqlInsertData = "INSERT INTO financialdata (Expense, Revenue, Income) VALUES ($totalExpenses, $revenue, $totalProfit)";
    mysqli_query($conn, $sqlInsertData);
}

// Delete all data from profit and expenses tables
$sqlDeleteProfit = "DELETE FROM profits";
mysqli_query($conn, $sqlDeleteProfit);

$sqlDeleteExpenses = "DELETE FROM expenses";
mysqli_query($conn, $sqlDeleteExpenses);

// Close connection
mysqli_close($conn);

?>

<?php
// Database connection
include 'connect.php';

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch revenue data for the last five months from financialdata table
$sql = "SELECT DATE_FORMAT(Date, '%M') AS Month, Revenue FROM financialdata ORDER BY Date DESC LIMIT 5";
$result = $conn->query($sql);

$revenueData = [];
$labels = [];

if ($result->num_rows > 0) {
    // Store the fetched revenue data and corresponding labels in reverse order
    while($row = $result->fetch_assoc()) {
        array_unshift($labels, $row["Month"]);
        array_unshift($revenueData, $row["Revenue"]);
    }
}

// Calculate revenue for the current month using profits and expenses
$currentMonthRevenue = 0;

// Calculate profit for the current month
$sql = "SELECT SUM(Amount) AS profit FROM profits WHERE MONTH(`date`) = MONTH(CURDATE())";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentMonthProfit = $row["profit"];
}

// Calculate expenses for the current month
$sql = "SELECT SUM(Amount) AS expenses FROM expenses WHERE MONTH(`date`) = MONTH(CURDATE())";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $currentMonthExpenses = $row["expenses"];
}

// Calculate revenue for the current month
$currentMonthRevenue = $currentMonthProfit - $currentMonthExpenses;

// Add current month's revenue to the revenue data array
$labels[] = date('F');
$revenueData[] = $currentMonthRevenue;

// Close connection
$conn->close();

// Prepare data array
$data = ['labels' => $labels, 'revenueData' => $revenueData];

// Output as JSON
echo json_encode($data);
?>

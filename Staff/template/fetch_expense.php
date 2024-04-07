<?php
include 'connect.php';

// Query to fetch the total expense for the month
$query = "SELECT SUM(Amount) AS totalExpense FROM Expenses";
$queryToday = "SELECT SUM(Amount) AS expenseToday FROM Expenses WHERE DATE(Date) = CURDATE();";

// Execute the query
$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $queryToday);
// Check if the query was successful
if ($result) {
    // Fetch the total expense from the result set
    $row = mysqli_fetch_assoc($result);
    $rowExpenseToday = mysqli_fetch_assoc($result2);
    
    // Format the total expense as a number with two decimal places
    $totalExpense = number_format($row['totalExpense'], 2);
    $expenseToday = number_format($rowExpenseToday['expenseToday'], 2);

    // Create a JSON response array
    $response = array(
        'total' => $totalExpense,
        'today' => $expenseToday
    );

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If the query fails, return an error message
    $response = array(
        'error' => 'Failed to fetch total expense'
    );

    // Send the JSON error response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>

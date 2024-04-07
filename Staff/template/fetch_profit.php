<?php
include 'connect.php';

// Query to fetch the total profit for the month
$query = "SELECT SUM(Amount) AS totalProfit FROM Profits";
$query2 = "SELECT SUM(Amount) AS totalExpense FROM Expenses";
// Execute the query
$result = mysqli_query($conn, $query);
$result2 = mysqli_query($conn, $query2);
// Check if the query was successful
if ($result && $result2) {
    // Fetch the total profit from the result set
    $row = mysqli_fetch_assoc($result);
    $row2 = mysqli_fetch_assoc($result2);
    
    // Ensure fetched values are numeric
    $totalProfit = is_numeric($row['totalProfit']) ? $row['totalProfit'] : 0;
    $totalExpense = is_numeric($row2['totalExpense']) ? $row2['totalExpense'] : 0;
    
    $revenue = $totalProfit - $totalExpense;

    // Create a JSON response array
    $response = array(
        'total' => $revenue
    );

    // Send the JSON response
    header('Content-Type: application/json');
    echo json_encode($response);
} else {
    // If the query fails, return an error message
    $response = array(
        'error' => 'Failed to fetch total profit'
    );

    // Send the JSON error response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);

?>
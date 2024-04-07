<?php
include 'connect.php';

// Query to fetch the total profit for today
$queryToday = "SELECT SUM(Amount) AS totalProfitToday FROM Profits WHERE DATE(Date) = CURDATE();";

// Execute the query for today's profit
$resultToday = mysqli_query($conn, $queryToday);

// Check if the query for today's profit was successful
if ($resultToday) {
    // Fetch the total profit for today from the result set
    $rowToday = mysqli_fetch_assoc($resultToday);
    
    // Format the total profit for today as a number with two decimal places
    $totalProfitToday = number_format($rowToday['totalProfitToday'], 2);

    // Query to fetch the total profit for yesterday
    $queryYesterday = "SELECT SUM(Amount) AS totalProfitYesterday FROM Profits WHERE DATE(Date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY);";

    // Execute the query for yesterday's profit
    $resultYesterday = mysqli_query($conn, $queryYesterday);

    // Check if the query for yesterday's profit was successful
    if ($resultYesterday) {
        // Fetch the total profit for yesterday from the result set
        $rowYesterday = mysqli_fetch_assoc($resultYesterday);

        // Calculate the percentage difference between today's and yesterday's profit
        $percentageDifference = 0;
        if ($rowYesterday['totalProfitYesterday'] != 0) {
            $percentageDifference = (($rowToday['totalProfitToday'] - $rowYesterday['totalProfitYesterday']) / $rowYesterday['totalProfitYesterday']) * 100;
        }

        // Format the total profit for yesterday as a number with two decimal places
        $totalProfitYesterday = number_format($rowYesterday['totalProfitYesterday'], 2);

        // Create a JSON response array with today's and yesterday's profit along with the percentage difference
        $response = array(
            'today' => $totalProfitToday,
            'percentageDifference' => number_format($percentageDifference, 2) // Format percentage difference to two decimal places
        );

        // Send the JSON response
        header('Content-Type: application/json');
        echo json_encode($response);
    } else {
        // If the query for yesterday's profit fails, return an error message
        $response = array(
            'error' => 'Failed to fetch total profit for yesterday'
        );

        // Send the JSON error response
        header('Content-Type: application/json');
        echo json_encode($response);
    }
} else {
    // If the query for today's profit fails, return an error message
    $response = array(
        'error' => 'Failed to fetch total profit for today'
    );

    // Send the JSON error response
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>

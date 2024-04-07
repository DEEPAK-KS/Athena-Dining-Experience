<?php
include 'connect.php'; // Assuming this file contains your database connection details and establishes the connection

session_start();


    // Retrieve form data
    $amount = $_POST["amountInput"];
    $description = $_POST["descInput"];
    $transactionType = $_POST["transactionTypeSelect"];
    
    // Insert data into the appropriate table based on transaction type
    if ($transactionType === "Expense") {
        // Insert into expenses table
        $sql = "INSERT INTO expenses (Category, Amount) VALUES ('$description', $amount)";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['transaction'] = "Expense record created successfully";
        } else {
            $_SESSION['transaction_error'] = "Error: " . $conn->error; // Corrected error message setting
        }
    } elseif ($transactionType === "Income") {
        // Insert into profits table
        $sql = "INSERT INTO profits (Source, Amount) VALUES ('$description', $amount)";
        if ($conn->query($sql) === TRUE) {
            $_SESSION['transaction'] = "Income record created successfully";
        } else {
            $_SESSION['transaction_error'] = "Error: " . $conn->error; // Corrected error message setting
        }
    } else {
        // Invalid transaction type
        $_SESSION['transaction_error'] = "Invalid transaction type";
    }
header('location:statistics.php')
?>

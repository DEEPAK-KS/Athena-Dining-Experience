<?php
// Start the session
session_start();

// Include the database connection
include 'connect.php';

// Retrieve item details from POST
$itemName = $_POST["itemName"];
$itemPrice = $_POST["itemprice"];

// Retrieve UsrID from session
$usrID = isset($_SESSION['userID']) ? $_SESSION['userID'] : null;

// Prepare SQL statement
$sql = "SELECT Qty FROM bill WHERE Name = '$itemName' AND UsrID = $usrID;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Fetch the result as an associative array
    $row = $result->fetch_assoc();
    // Access the Qty value
    $quantity = $row["Qty"] - 1;
    if ($quantity > 0) {
        $cost = $quantity * $itemPrice;
        $sql = "UPDATE bill SET Qty = $quantity, Cost = $cost WHERE Name = '$itemName' AND UsrID = $usrID;";
    } else {
        $sql = "DELETE FROM bill WHERE Name = '$itemName' AND UsrID = $usrID;";
    }
} 

if ($conn->query($sql) === TRUE) {
    // Send a success response back to the client
    echo json_encode(["status" => "success", "message" => "Item deleted/updated successfully!"]);
} else {
    // Send an error response back to the client
    echo json_encode(["status" => "error", "message" => "Error deleting/updating item: " . $conn->error]);
}

// Close the database connection
$conn->close();
?>

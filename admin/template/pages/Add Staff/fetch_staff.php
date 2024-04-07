<?php
include 'connect.php';

session_start();

// Assuming you have sanitized the input to prevent SQL injection
if(isset($_SESSION['SuperAdmin'])){
    $staffID = $_SESSION['SuperAdmin'];
} elseif(isset($_SESSION['admin'])) {
    $staffID = $_SESSION['admin'];
}

$inputChar = $_POST['inputChar'];

$query = "SELECT FirstName, LastName FROM staff WHERE FirstName LIKE '$inputChar%' and UserType <> 'superAdmin' and StaffID <> $staffID";

$result = mysqli_query($conn, $query);

$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);

mysqli_close($conn);
?>

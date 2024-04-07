<?php
include 'connect.php';

$inputChar = $_POST['inputChar'];

$query = "SELECT FirstName, LastName FROM staff WHERE FirstName LIKE '$inputChar%'";

$result = mysqli_query($conn, $query);

$rows = array();
while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
}

echo json_encode($rows);

mysqli_close($conn);
?>

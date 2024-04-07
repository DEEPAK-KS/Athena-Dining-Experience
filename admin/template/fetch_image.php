<?php
session_start();

include 'connect.php';

// Assuming you have sanitized the input to prevent SQL injection
if(isset($_SESSION['SuperAdmin'])){
    $staffID = $_SESSION['SuperAdmin'];
} elseif(isset($_SESSION['admin'])) {
    $staffID = $_SESSION['admin'];
} 


// Query to fetch the ImagePath based on StaffID
$sql = "SELECT ImagePath FROM staff WHERE StaffID = $staffID";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Fetch the ImagePath from the result set
    $row = $result->fetch_assoc();
    $imagePath = $row['ImagePath'];
    // Output the ImagePath
    echo $imagePath;
} else {
    echo "Image not found"; // Handle the case where the image is not found
}
?>

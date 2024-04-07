<?php
session_start();

if(isset( $_SESSION['staff'])){
    $staffID =  $_SESSION['staff'] ;
} 
include 'connect.php'; // Assuming this file contains database connection

// Fetch user details from the database
$query = "SELECT CONCAT(FirstName, ' ', LastName) AS FullName, PhoneNumber, Email, Gender, DateOfBirth AS Dob, CuisinePreferences, Type, status AS Status, Address1, Address2, State, City, Postcode, Country FROM staff WHERE StaffID = $staffID "; 
$result = $conn->query($query);

if ($result->num_rows > 0) {
    // Fetch data
    $row = $result->fetch_assoc();
    $userData = array(
        'FullName' => $row['FullName'],
        'Phone' => $row['PhoneNumber'],
        'Email' => $row['Email'],
        'Gender' => $row['Gender'],
        'Dob' => $row['Dob'],
        'CuisinePreferences' => $row['CuisinePreferences'],
        'Type' => $row['Type'],
        'Status' => $row['Status'],
        'Address1' => $row['Address1'],
        'Address2' => $row['Address2'],
        'State' => $row['State'],
        'City' => $row['City'],
        'Postcode' => $row['Postcode'],
        'Country' => $row['Country']
    );

    // Send JSON response
    echo json_encode($userData);
} else {
    echo json_encode(array('error' => 'User not found'));
}

$conn->close();
?>

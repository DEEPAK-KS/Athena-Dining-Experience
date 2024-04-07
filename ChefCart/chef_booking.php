<?php
session_start();
include 'connect.php'; // Corrected file extension

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $city = $_POST["city"];
    $email = $_POST["email"];
    $service = $_POST["service"];
    $number_of_people = $_POST["numberOfPeople"];
    $food_type = $_POST["type"];
    $contact = $_POST["contact"];
    $dob = $_POST["dob"];
    $location = $_POST["locationInput"];

    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO chefbooking (name, city, email, service, number_of_people, food_type, contact, dob, location) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");

    // Bind parameters and execute query
    $stmt->execute([$name, $city, $email, $service, $number_of_people, $food_type, $contact, $dob, $location]);

    // Optionally, you can redirect the user to another page after successful submission3
    $_SESSION['Success']=1;
    header("Location: index.php");
    exit();
}
?>

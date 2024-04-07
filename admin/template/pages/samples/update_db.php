<?php
session_start();
include 'connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve staffID from session
    $staffID = $_SESSION['current_staffID'];

    // Retrieve all other form fields
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $cuisine = implode(',', $_POST['cuisine']); // Convert array to comma-separated string
    $membership = $_POST['membershipRadios'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address1 = $_POST['address1'];
    $state = $_POST['state'];
    $address2 = $_POST['address2'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    // Now you have all the field values, you can use them to update the database
    // Construct your SQL update query
    $sql = "UPDATE staff SET FirstName = '$firstName', LastName = '$lastName', Gender = '$gender', DateOfBirth = '$dob', CuisinePreferences = '$cuisine', Type = '$membership', Email = '$email', PhoneNumber = '$phone', Address1 = '$address1', State = '$state', Address2 = '$address2', Postcode = '$postcode', City = '$city', Country = '$country' WHERE StaffID = '$staffID'";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        $_SESSION['staff_set'] = true;
        header('Location: view_staff.php');
        exit(); // Exit after redirect
    } else {
        $_SESSION['staff_set_error'] = 'Error updating staff details: ' . $conn->error;
        header('Location: view_staff.php');
        exit(); // Exit after redirect
    }
} else {
    $_SESSION['staff_set_error'] = 'Invalid request method';
    header('Location: view_staff.php');
    exit(); // Exit after redirect
}

$conn->close();
?>

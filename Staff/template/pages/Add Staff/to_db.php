<?php
include 'connect.php';
session_start();
// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    // Check if the email already exists
    $check_query = "SELECT * FROM Staff WHERE Email = '$email'";
    $result = $conn->query($check_query);
    if ($result->num_rows > 0) {
        $_SESSION['staff_set_error'] = "Email already exists.";
        if(isset($_SESSION['admin'])){
            header('Location:Staff_1.php');
          }
          else if(!isset($_SESSION['SuperAdmin'])){
            header('location:staff.php');
          }
        
        exit(); // Exit to prevent further execution
    }

    // Continue with the rest of the form data processing if email doesn't exist
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    if ($gender=='Male'){
        $name='man.png';
    }
    else{
        $name='girl.png';
    }

    // Format date of birth
    $dob = $_POST['dob'];

    $cuisine = implode(', ', $_POST['cuisine']); // Convert array to string
    $type = $_POST['membershipRadios'];
    $address1 = $_POST['address1'];
    $state = $_POST['state'];
    $address2 = $_POST['address2'];
    $postcode = $_POST['postcode'];
    $city = $_POST['city'];
    $country = $_POST['country'];
    $phoneNumber = $_POST['phone'];

    // Insert data into Staff table
    $sql = "INSERT INTO Staff (FirstName, LastName, Gender, DateOfBirth, CuisinePreferences, Type, Address1, State, Address2, Postcode, City, Country, Email, PhoneNumber, ImagePath, status, UserType) 
            VALUES ('$firstName', '$lastName', '$gender', '$dob', '$cuisine', '$type', '$address1', '$state', '$address2', '$postcode', '$city', '$country', '$email', '$phoneNumber', '$name', 1, 'staff')";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['staff_set']="done";
        if(isset($_SESSION['admin'])){
            header('Location:Staff_1.php');
          }
          else if(!isset($_SESSION['SuperAdmin'])){
            header('location:staff.php');
          }
    } else {
        $_SESSION['staff_set_error'] = "Error: " . $conn->error;
        if(isset($_SESSION['admin'])){
            header('Location:Staff_1.php');
          }
          else if(!isset($_SESSION['SuperAdmin'])){
            header('location:staff.php');
          }
    }
}
$conn->close();
// Close connection
?>

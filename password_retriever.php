<?php
include 'connect.php';

// Check if the email is set in the POST request
if(isset($_POST['email'])) {
    // Get the email from the POST request
    $email = $_POST['email'];
    
    $sql = "SELECT Password FROM credentials WHERE Email = '$email';";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        $row = $result->fetch_assoc();
        $password = $row['Password'];
    }

    // Send the password as a JSON response
    echo json_encode(array('password' => $password));
} else {
    // Handle the case when the email is not set in the POST request
    echo json_encode(array('error' => 'Email not provided.'));
}
?>

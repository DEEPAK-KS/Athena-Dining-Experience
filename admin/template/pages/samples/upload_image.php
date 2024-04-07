<?php
include 'connect.php';
session_start();

// Assuming you have sanitized the input to prevent SQL injection
if(isset($_SESSION['SuperAdmin'])){
    $staffID = $_SESSION['SuperAdmin'];
} elseif(isset($_SESSION['admin'])) {
    $staffID = $_SESSION['admin'];
}

// Handle file upload
if (isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $fileExtension = pathinfo($file['name'], PATHINFO_EXTENSION); // Get the file extension

    // Generate new filename based on staff ID
    $newFileName = $staffID . "." . $fileExtension;

    // Specify directory to save the uploaded images
    $targetDirectory = "../Add Staff/assets/";

    // Move the uploaded file to the specified directory with the new filename
    $targetPath = $targetDirectory . $newFileName;
    move_uploaded_file($file['tmp_name'], $targetPath);

    // Update the image path in the database
    $sql = "UPDATE staff SET ImagePath = '$newFileName' WHERE StaffID = $staffID";
    if ($conn->query($sql) === TRUE) {
        $response = array("success" => true);
        echo json_encode($response);
    } else {
        $response = array("success" => false);
        echo json_encode($response);
    }
} else {
    $response = array("success" => false);
    echo json_encode($response);
}

$conn->close();
?>

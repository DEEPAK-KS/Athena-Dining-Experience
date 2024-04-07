<?php
include 'connect.php';

session_start();

if(isset($_SESSION['SuperAdmin'])){
    $staffID = $_SESSION['SuperAdmin'];
} elseif(isset($_SESSION['admin'])) {
    $staffID = $_SESSION['admin'];
}

// Function to sanitize input
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if phone number is set and valid
if (isset($_POST['phone_number'])) {
    $phone_number = sanitize_input($_POST['phone_number']);

    // Basic validation
    if (!preg_match("/^[0-9]{10}$/", $phone_number)) {
        echo json_encode(array("status" => "error", "message" => "Invalid phone number"));
        exit();
    }

    // Assuming you have staff ID available in $_POST['staff_id']
    $staff_id = $staffID;

    // Prepare and bind update statement
    $stmt = $conn->prepare("UPDATE staff SET PhoneNumber = ? WHERE StaffID = ?");
    $stmt->bind_param("si", $phone_number, $staff_id);

    // Execute the statement
    if ($stmt->execute() === TRUE) {
        echo json_encode(array("status" => "success", "message" => "Phone number updated successfully"));
    } else {
        echo json_encode(array("status" => "error", "message" => "Error updating phone number: " . $conn->error));
    }

    // Close statement
    $stmt->close();
} else {
    echo json_encode(array("status" => "error", "message" => "Phone number not provided"));
}

// Close connection
$conn->close();
?>

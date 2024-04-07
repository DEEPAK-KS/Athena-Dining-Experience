<?php
    session_start();
    include 'connect.php';
    $Name=$_POST['name'];
    $Email=$_POST['email_value'];
    $Pswd=$_POST['password_reg'];
    $_SESSION["usr_Name"] = $Name ;
    $result = $conn->query("SELECT * FROM credentials WHERE Email = '$Email';");
    if ($result->num_rows > 0) {
    // Email already exists, handle accordingly
    $_SESSION["dplt_email"] = 1 ;
    header("Location: login.php");
    exit();
    }
    else{
    $sql="INSERT INTO credentials (Name,Email,Password) VALUES ('$Name', '$Email', '$Pswd');";
    if($conn->query($sql)){
        $_SESSION["registered"]= 1 ;
        $sql="SELECT User_ID FROM credentials WHERE Email = '$Email';";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $_SESSION["usr_ID"] = $row['User_ID'] ;
        header("Location: index.php");
        exit();
    }
    else{
        $_SESSION["registered"]= 0 ;
    }
    }
?>
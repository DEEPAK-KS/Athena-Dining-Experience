<?php
session_start();
unset($_SESSION['userName']);
unset($_SESSION['userID']);
session_destroy();
header("Location: reset_jump.php");
?>
<?php
    session_start();
    if(!isset($_SESSION["username"])) {
        header("Location: index.php");
        exit();
    }

    // Check user role
    if(!isset($_SESSION["role"])) {
        // No role set, redirect to login page
        header("Location: index.php");
        exit();
    }
?>

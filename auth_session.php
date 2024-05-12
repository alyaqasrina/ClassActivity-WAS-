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


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    // Generate CSRF token
    if(empty($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
?>

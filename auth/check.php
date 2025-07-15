<?php
session_start();

// If user is not logged in, redirect to login page
if (!isset($_SESSION['user_id'])) {
    header("Location: /appointment-app/public/auth/login.php?error=Please+login+first");
    exit();
}

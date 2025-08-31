<?php
// Start the session so we can access session variables
// This is based on how sessions are started and checked in "Login with Sessions labsheet 2023"
session_start();

// Check if the user is not logged in by seeing if user_id is missing from session
if (!isset($_SESSION['user_id'])) {
    // If user isn't logged in, send them back to the login page with an error message
    header("Location: /appointment-app/public/auth/login.php?error=Please+login+first");
    exit(); 
}

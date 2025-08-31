<?php
// Start the session if it hasn't already started
// This pattern (session_status check) is used throughout the SymfonyCasts transcript and in my CRUD Part 2 notes
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in by looking for the session variable 'user_id'
// If it's not set, redirect them back to the login page with an error message
// This logic comes directly from the Login with Sessions labsheet 2023, where the session is used to protect pages that require authentication
if (!isset($_SESSION['user_id'])) {
    header("Location: /appointment-app/public/auth/login.php?error=Please+login+first");
    exit(); // Always stop the script after a redirect
}

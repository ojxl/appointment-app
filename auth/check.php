<?php
// Start the session so we can access session variables
// This is based on how sessions are started and checked in "Login with Sessions labsheet 2023"
session_start();

// Check if the user is not logged in by seeing if user_id is missing from session
// I'm using `isset()` which is a safer check and is also demonstrated in "Build a no-frills PHP CRUD App with routing - part2.pdf"
if (!isset($_SESSION['user_id'])) {
    // If user isn't logged in, send them back to the login page with an error message
    // Redirection like this is used throughout the login labsheet and the Symfony tutorial as a way to protect routes
    header("Location: /appointment-app/public/auth/login.php?error=Please+login+first");
    exit(); //include exit after header redirects to stop further code from running
}

// Reference summary:
// - session_start and $_SESSION checks → "Login with Sessions labsheet 2023"
// - use of isset() for safe variable checking → "Build a no-frills PHP CRUD App with routing - part2.pdf"
// - header() for redirects → SymfonyCasts Ep.3, PHP built-in method

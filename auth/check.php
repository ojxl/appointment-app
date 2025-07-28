<?php
// Adapted from login/session redirection logic in "Login with Sessions labsheet 2023"
// The labsheet checks if $_SESSION['Active'] is false; here we use isset() for safety (as taught in Part 2)
session_start();

//isset comes from part 2. if its not set, we redirect to login
if (!isset($_SESSION['user_id'])) {
    header("Location: /appointment-app/public/auth/login.php?error=Please+login+first");
    exit();
}
//comment to check if git works 
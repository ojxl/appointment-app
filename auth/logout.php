<?php
session_start();
session_unset(); // Clear session variables
session_destroy(); // Destroy the session

// Redirect to login page
header("Location: /appointment-app/public/auth/login.php?message=Logged+out+successfully");
exit();

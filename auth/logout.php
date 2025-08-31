<?php

// Start the session so PHP can access session variables
session_start(); 

// Clear all session variables to log the user out
session_unset(); 

// Destroy the session entirely (removes session ID on server)
session_destroy(); // Taught in Login labsheet – this officially ends the session

// After logging out, redirect back to the login page with a success message
header("Location: /appointment-app/public/auth/login.php?message=Logged+out+successfully");
exit();
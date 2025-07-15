<?php
include '../templates/header.php'; 
// Start session only if not already started
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// If not logged in, redirect to login
if (!isset($_SESSION['user_id'])) {
    header("Location: /appointment-app/public/auth/login.php?error=Please+login+first");
    exit();
}

?>
<?php include '../templates/footer.php'; ?>

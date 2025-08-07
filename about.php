<?php
// about.php - Accessible to both logged in and logged out users

require_once 'templates/header.php'; // Use the same header for consistency
?>

<div class="container mt-5">
    <h2>About Us</h2>
    <p>BooksAgain is a mock book reservation platform built as part of a college project.</p>
    <p>It allows users to select books, add them to a cart, and schedule a pickup appointment from the store.</p>
    <p>This system was built to showcase secure login functionality, appointment scheduling, and session-based cart tracking using PHP and MySQL.</p>
    <p>All data is securely stored and managed using PDO and follows best practices in user authentication and input validation.</p>
    <p>This page as you can see is accessible to the user without needing to login! :></p>

    <img src="images/reading.jpg" alt="Person reading a book" width="500">

</div>

<?php require_once 'templates/footer.php'; ?>

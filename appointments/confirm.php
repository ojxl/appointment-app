<?php
// Start the session and load helper functions for cart management
// These are used to track user login and store/retrieve the cart data
require_once '../includes/session.php'; // From L6 Cookies & Sessions.pptx and lab login flow
require_once '../includes/cart_functions.php'; // Cart logic built using SymfonyCasts Ep. 3 session data handling
require_once '../includes/db.php'; // Database connection setup 

// Check if the form was submitted with the POST method (i.e., user clicked 'Confirm Appointment')
// This was covered in Forms and Form Validation.pptx and Day 5–6 of the lab
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the selected date and time from the form (with fallback to empty string if not set)
    // These inputs come directly from the appointment form (Forms and Validation.pptx)
   // Get the selected date and time from the form (with fallback to empty string if not set)
$date = $_POST['pickup_date'] ?? '';
$timeInput = $_POST['pickup_time'] ?? '';

// Convert time to MySQL TIME format (24-hour HH:MM:SS)
$time = date("H:i:s", strtotime($timeInput));//https://www.php.net/manual/en/function.date.php


    // Check the currently logged-in user's username (session comes from login system)
    $user = $_SESSION['username'] ?? 'Guest'; // Username was stored during login (lab Day 2–3)
    $user_id = $_SESSION['user_id'] ?? null; // Getting user ID to link booking to the right account

    // If both fields are filled, store the booking information in the session
   if ($date && $time && $user_id) {

    // Get books from the cart and extract just the titles
    $books = getCart();
    $bookTitles = array_map(function($book) {//https://www.php.net/manual/en/function.array-map.php
        return $book['title'];
    }, $books);
    $notes = implode(', ', $bookTitles); // Turn into comma-separated string. CRUD tutorial pt1 
    // Store appointment in database including the notes (book titles)
    $stmt = $pdo->prepare("
    INSERT INTO appointments (user_id, appointment_date, appointment_time, notes) 
    VALUES (:user_id, :appointment_date, :appointment_time, :notes)");
    $stmt->execute([
        ':user_id' => $user_id,
        ':appointment_date' => $date,
        ':appointment_time' => $time,
        ':notes' => $notes
    ]);


        // Save appointment details into session so we can use it on the confirmation screen
        $_SESSION['appointment'] = [
            'user' => $user,
            'date' => $date,
            'time' => $time,
            'books' => getCart(), // Grab current cart books from the session (SymfonyCasts Ep. 3)
        ];

        // After booking, empty the cart to prevent re-booking same items
        clearCart(); // Custom function made earlier using sessions

        // Redirect the user to the appointment confirmation page (standard redirect like in login-process.php)
        header("Location: success.php");
        exit; // Exit here to prevent any extra processing
    } else {
        // If something is missing, display an error message
        echo "Missing date or time.";
    }
}
?>
<?php
// Include login check to make sure only logged-in users can delete appointments
//'Login with Sessions labsheet 2023' and 'L6 Cookies & Sessions.pptx'
require_once '../auth/check.php';

// Include the database connection file
require_once '../includes/db.php';

// Retrieve the appointment ID from the URL query string
// 'Forms and Form Validation.pptx'
$appointment_id = $_GET['id'] ?? null; // null if not provided

// Check that we actually received an appointment ID before continuing
if ($appointment_id) {
    // Prepare an SQL DELETE statement with placeholders to avoid SQL injection
    // Using named placeholders follows PDO examples from the labs and SymfonyCasts tutorials
    $stmt = $pdo->prepare("
    DELETE FROM appointments 
    WHERE id = :id AND user_id = :user_id
        ");
    $stmt->execute([
    ':id'      => $id,
    ':user_id' => $userId
    ]);


    // redirect back to the appointments list with a success message
    header("Location: view-appointments.php?message=Appointment+deleted+successfully");
    exit;
} else {
    // If no ID was provided, redirect back with an error message
    header("Location: view-appointments.php?error=No+appointment+ID+provided");
    exit;
}

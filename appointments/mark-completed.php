<?php
// Reference: Based on "Build a no-frills PHP CRUD App with routing - part2" for the UPDATE pattern
// and "Login with Sessions labsheet 2023" for session-based authentication checking

require_once '../auth/check.php'; // Ensures only logged-in users can run this script (L6 Cookies & Sessions.pptx)
require_once '../includes/db.php'; // Connects to the database using PDO (Summer Sitting Project Brief requirement)

// Get the appointment ID from the URL query string
$appointment_id = $_GET['id'] ?? null; // The '??' null coalescing operator was shown in lab examples for safe defaults
$user_id = $_SESSION['user_id'] ?? null; // Session variable storing the currently logged-in user's ID (from login process)

// If both appointment ID and user ID are present, proceed
if ($appointment_id && $user_id) {
    // SQL UPDATE query using named placeholders to avoid SQL injection
    $sql = "UPDATE appointments 
            SET status = 'completed' 
            WHERE id = :id AND user_id = :user_id";

    // Prepare the query (PDO::prepare) as taught in "Build a no-frills PHP CRUD App"
    $stmt = $pdo->prepare($sql);

    // Execute the statement with bound parameters
    $stmt->execute([
        ':id' => $appointment_id,
        ':user_id' => $user_id
    ]);
}

// Redirect back to appointments page after marking as completed
// header() redirection covered in PHP basics and used in multiple lab examples
header("Location: view-appointments.php");
exit();

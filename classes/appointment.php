<?php
// This class handles all the database logic for appointments in one place.
// Reference: CRUD logic from "Build a no-frills PHP CRUD App with routing - part2"

class Appointment {
    private $pdo;      // The PDO database connection object
    private $user_id;  // Logged-in user's ID (used to make sure users only see their own data)

    // Constructor runs automatically when the class is created
    // Covered in OOP intro from "4_Website file structure and MVCs intro.pptx"
    public function __construct($pdo, $user_id) {
        $this->pdo = $pdo;           // Save the PDO connection for use in queries
        $this->user_id = $user_id;   // Save the current user's ID
    }

    // Get all appointments for this user, optionally filtering by a search term
    public function getAll($search = '') {
    // Reference: CRUD Part 1 - "Viewing Users (Read)" example, simple execute array 
    if (empty($search)) {
        $stmt = $this->pdo->prepare("SELECT id, appointment_date, appointment_time, notes, status FROM appointments WHERE user_id = ? ORDER BY appointment_date DESC, appointment_time DESC");

$stmt->execute([$this->user_id]);

    } else {
        // If search term present, filter by date, time, or notes using LIKE
        // Pattern: LIKE with wildcards (%) taught in CRUD Part 1 - "Filterig users" 
        // Here we add three LIKE conditions and pass the wildcard wapped search term for each.
       $stmt = $this->pdo->prepare("SELECT id, appointment_date, appointment_time, notes, status
    FROM appointments
    WHERE user_id = ?
    AND (appointment_date LIKE ? OR appointment_time LIKE ? OR notes LIKE ?)
    ORDER BY appointment_date DESC, appointment_time DESC
");

$stmt->execute([$this->user_id, $search, $search, $search]);

        // Inline '%' . $search . '%' exactly like CRUD examples:
        // Passing all parameters in one array in correct order (user_id, then each LIKE term)
        $stmt->execute([
            $this->user_id,
            '%'.$search.'%',  // matches appointment_date
            '%'.$search.'%',  // matches appointment_time
            '%'.$search.'%'   // matches notes
        ]);
    }

    // Reference: CRUD Part 1 - fetchAll() 
    return $stmt->fetchAll();
}


    // Mark a specific appointment as completed
    // Reference: UPDATE queries covered in SQL CRUD lab & W3Schools https://www.w3schools.com/sql/sql_update.asp
    public function markCompleted($id) {
        $stmt = $this->pdo->prepare("UPDATE appointments 
    SET status = 'completed' 
    WHERE id = :id AND user_id = :user_id
    ");

    // Execute with the appointment ID and current user ID to make sure they own it
    return $stmt->execute([
        ':id'      => $id,
        ':user_id' => $this->user_id
    ]);

    }
}

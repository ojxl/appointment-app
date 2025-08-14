<?php
// This class handles all the database logic for appointments in one place.
// Reference: CRUD logic from "Build a no-frills PHP CRUD App with routing - part2"
// plus query structure and prepared statements from module labs & PDO lecture notes.

// Using a class makes it easier to keep code organised (fits the brief's MVC requirement)
// and avoids repeating the same SQL in multiple files.

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
    // Reference for LIKE operator: https://www.w3schools.com/sql/sql_like.asp
    public function getAll($search = '') {
        // Base SQL query to get all appointment details for this user
        $sql = "SELECT id, appointment_date, appointment_time, notes, status 
                FROM appointments 
                WHERE user_id = :user_id";

        // Parameters array starts with the logged-in user's ID
        $params = [':user_id' => $this->user_id];

        // If search is not empty, add extra conditions for date, time or notes
        if (!empty($search)) {
            $sql .= " AND (appointment_date LIKE :search 
                        OR appointment_time LIKE :search 
                        OR notes LIKE :search)";
            $params[':search'] = "%$search%"; // Wildcards allow partial matches
        }

        // Prepare the SQL to prevent SQL injection (taught in PDO labs)
        $stmt = $this->pdo->prepare($sql);

        // Execute with the parameters
        $stmt->execute($params);

        // Return all matching appointments as an array
        return $stmt->fetchAll();
    }

    // Mark a specific appointment as completed
    // Reference: UPDATE queries covered in SQL CRUD lab & W3Schools https://www.w3schools.com/sql/sql_update.asp
    public function markCompleted($id) {
        $sql = "UPDATE appointments SET status = 'completed' 
                WHERE id = :id AND user_id = :user_id";
        $stmt = $this->pdo->prepare($sql);
        // Execute with the appointment ID and current user ID to make sure they own it
        return $stmt->execute([':id' => $id, ':user_id' => $this->user_id]);
    }
}

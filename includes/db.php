<?php
// includes/db.php
// Reference: Using our OOP Database class instead of procedural connection (adapted from CRUD App part1)

// Load the Database class
require_once __DIR__ . '/../classes/Database.php';

// Create an instance of the class
$dbInstance = new Database();

// Get the PDO connection
$pdo = $dbInstance->getConnection();

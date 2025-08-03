<?php

// Set the database host (local development using Laragon, as per project setup)
$host = '127.0.0.1';

// Name of the database (created in HeidiSQL)
$db   = 'appointment-app';

// Default MySQL user for Laragon/XAMPP is 'root'
$user = 'root';

// No password needed by default in local environments like Laragon
$pass = '';

// Set the character encoding for the connection (used in SymfonyCasts and labsheet)
$charset = 'utf8mb4';

// DSN (Data Source Name) that defines the connection string format
// Referenced in SymfonyCasts Ep.3: "mysql:dbname=air_pup;host=localhost"
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Configure PDO options:
// - Set error mode to exception (recommended in both SymfonyCasts and CRUD Part 2)
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Helps catch errors more clearly
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Easier to work with named keys like $row['name']
    PDO::ATTR_EMULATE_PREPARES   => false, // Important for security (prevents SQL injection)
];

// Attempt to connect to the database using PDO
try {
    // This line creates the PDO object using the credentials above
    // As demonstrated in SymfonyCasts Ep.3 and seen in Part 2 CRUD notes
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    // If connection fails, this message will help with debugging
    // Recommended approach from PDO error handling examples in both the CRUD PDF and SymfonyCasts
    die("Database connection failed: " . $e->getMessage());
}

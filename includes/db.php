<?php

$host = '127.0.0.1';// Database host
$db   = 'appointment-app';// Database name
$user = 'root';// Database user
$pass = '';// Database password usually empty 
$charset = 'utf8mb4';// Character set

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";// Data Source Name

// Using PDO for database connection
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,//
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

// Create a new PDO instance
try {
    $pdo = new PDO($dsn, $user, $pass, $options);// Establish the database connection
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());// Handle connection error
}

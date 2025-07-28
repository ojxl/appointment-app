<?php

require_once '../includes/db.php';
session_start();

// Get form data. The ?? '' makes sure that if the user leaves it blank, it still sets an empty string.
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validation to make sure something is put in 
if (empty($username) || empty($password)) {
    header("Location: login.php?error=Please fill in all fields");
    exit();
}

// Using prepared statement with PDO. i think i need to fix the username and email check i think thats whats bugging.
$sql = "SELECT * FROM users WHERE username = :username OR email = :email";
// Prepare the statement
$stmt = $pdo->prepare($sql);
// Bind parameters to prevent SQL injection
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
// Bind email as well to check both username and email
$stmt->bindValue(':email', $username, PDO::PARAM_STR);
// Execute the statement
$stmt->execute();

// Fetch the user data
$user = $stmt->fetch();

// Check if user exists and verify password and take ti dashboard if correct
if ($user) {
    // Verify the password
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../dashboard.php");
        exit();
        // Redirect to the dashboard if login is successful
    } else {
        // Invalid password
        header("Location: login.php?error=Invalid password");
        exit();
    }
    // User found, set session variables
} else {
    header("Location: login.php?error=User not found");
    exit();
}

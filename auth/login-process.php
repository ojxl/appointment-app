<?php

// Start session and connect to the database using PDO (covered in SymfonyCasts Ep.3 and WebDev Part 1 PDF)
require_once '../src/db.php';
session_start();

// Get the username and password from the form (Part 2 PDF shows how to access form data with $_POST)
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Check if either field is empty (this is basic validation from the Forms & Validation slides)
if (empty($username) || empty($password)) {
    header("Location: login.php?error=Please fill in all fields");
    exit();
}

// Use a prepared statement to protect against SQL injection (covered in SymfonyCasts and WebDev Part 1)
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");

$stmt->execute([
    ':username' => $username,
    ':email'    => $email
]);


// Bind the same value to both :username and :email so users can log in using either
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $username, PDO::PARAM_STR);
$stmt->execute();

// Fetch the user record from the database
$user = $stmt->fetch();

// If a user is found, check the password using password_verify (also taught in SymfonyCasts Ep.3)
if ($user) {
    if (password_verify($password, $user['password'])) {
        // If the password is correct, log them in and set session data (from Login with Sessions labsheet 2023)
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];

        // Redirect to dashboard on successful login
        header("Location: ../dashboard.php");
        exit();
    } else {
        // If the password doesn't match, show error
        header("Location: login.php?error=Invalid password");
        exit();
    }
} else {
    // If no user found with that username/email, show error
    header("Location: login.php?error=User not found");
    exit();
}

<?php
// Connect to the database using PDO (from SymfonyCasts Ep.3 example)
require_once '../src/db.php';

// Get data from the form (?? '' is from my login-process.php to handle empty fields safely)
$username = $_POST['username'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

// Validation check (from Forms and Form Validation.pptx)
if (empty($username) || empty($email) || empty($password)) {
    header("Location: register.php?error=Please fill in all fields");
    exit();
}

// Check if username or email already exists in DB (prepared statements from PDO lesson)
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->execute();


if ($stmt->fetch()) {
    // Stop duplicate accounts
    header("Location: register.php?error=Username or Email already exists");
    exit();
}

// Hash the password before saving (from PHP manual - password_hash, also used in my login system)
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Insert new user into database
$stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $hashedPassword, PDO::PARAM_STR);
$stmt->execute();


if ($stmt->execute()) {
    // Registration successful
    header("Location: register.php?success=Account created! You can now log in.");
    exit();
} else {
    // Something went wrong
    header("Location: register.php?error=Something went wrong. Please try again.");
    exit();
}
?>

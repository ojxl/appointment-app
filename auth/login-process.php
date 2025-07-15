<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../includes/db.php';
session_start();

// Get form data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

// Validation
if (empty($username) || empty($password)) {
    header("Location: login.php?error=Please fill in all fields");
    exit();
}

// Use prepared statement with PDO
$sql = "SELECT * FROM users WHERE username = :username OR email = :username";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':username', $username);
$stmt->execute();

$user = $stmt->fetch();

if ($user) {
    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        header("Location: ../dashboard.php");
        exit();
    } else {
        header("Location: login.php?error=Invalid password");
        exit();
    }
} else {
    header("Location: login.php?error=User not found");
    exit();
}

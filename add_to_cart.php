<?php
require_once 'includes/session.php';
require_once 'includes/cart_functions.php';

$title = $_GET['title'] ?? '';
$author = $_GET['author'] ?? '';
$price = $_GET['price'] ?? '';

if ($title && $author && $price) {
    $book = [
        'title' => $title,
        'author' => $author,
        'price' => $price
    ];
    addToCart($book);
}

// Redirect back to home
header("Location: index.php");
exit();

<?php
// Start the session and bring in the cart functionality so we can use session-based storage
require_once 'includes/session.php'; // session management (ref: Login with Sessions labsheet 2023)
require_once 'includes/cart_functions.php'; // handles add/remove cart functions (ref: cart_functions.php from project)

// These values are sent from the product form in index.php using the GET method
$title = $_GET['title'] ?? '';  // fallback to empty string if not set (ref: SymfonyCasts Ep3 - $_GET usage)
$author = $_GET['author'] ?? '';
$price = $_GET['price'] ?? '';

// We only want to add if all 3 values are present (title, author, price)
if ($title && $author && $price) {
    // Build an array of the book details to store in the cart
    $book = [
        'title' => $title,
        'author' => $author,
        'price' => $price
    ];

    // Call the helper function to add this book to the cart (ref: cart_functions.php logic)
    addToCart($book);
}

// After adding the item, we redirect the user back to the homepage
// This redirect approach is shown in both: SymfonyCasts Ep3 and CRUD Part 2 PDF
header("Location: index.php");
exit();
?>

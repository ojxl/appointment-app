<?php
require_once 'cart_functions.php';

// We'll mock the book data for now, as it's being sent via POST from the "Add to Cart" button.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $author = $_POST['author'] ?? '';
    $price = $_POST['price'] ?? '';
    $image = $_POST['image'] ?? '';

    // basic validation
    if ($title && $author && $price) {
        $book = [
            'title' => $title,
            'author' => $author,
            'price' => $price,
            'image' => $image,
        ];

        addToCart($book);
        header('Location: cart.php'); // send them to the cart page
        exit;
    } else {
        echo "Missing book data.";
    }
}
?>

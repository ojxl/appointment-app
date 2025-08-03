<?php
// Start the session and include cart functionality
require_once '../includes/session.php';
require_once '../includes/cart_functions.php';

// Get the current user's cart items
$cartItems = getCart();

// If the cart is empty, send them back to the cart page (no appointment without books)
if (empty($cartItems)) {
    header("Location: ../cart.php");
    exit;
}
?>

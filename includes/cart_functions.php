<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Add a book to cart
function addToCart($book) {
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Prevent duplicates (optional)
    foreach ($_SESSION['cart'] as $item) {
        if ($item['title'] === $book['title']) {
            return; // already in cart
        }
    }

    $_SESSION['cart'][] = $book;
}

// Get all cart items
function getCart() {
    return $_SESSION['cart'] ?? [];
}


// Remove book by title
function removeFromCart($title) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['title'] === $title) {
                unset($_SESSION['cart'][$index]);
                $_SESSION['cart'] = array_values($_SESSION['cart']); // reindex
                break;
            }
        }
    }
}

// Clear all cart
function clearCart() {
    unset($_SESSION['cart']);
}
?>

<?php
// Start the session if it hasn't been started yet
// This practice is shown in the Login with Sessions labsheet and the SymfonyCasts Ep.3 transcript (session_start explained clearly)
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// FUNCTION: addToCart
// Adds a book (as an associative array) to the session-based cart
// This logic is built using standard PHP session handling introduced in SymfonyCasts Ep.3 and reused in your labsheet code
function addToCart($book) {
    // If cart is not set yet, initialize it as an empty array
    // Matches the pattern of $_SESSION usage from SymfonyCasts where pet/cart data is stored in memory
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Prevents duplicate entries by checking the title (simple comparison logic)
    // Based on the logic taught in SymfonyCasts Ep.3 when looping over pet data
    foreach ($_SESSION['cart'] as $item) {
        if ($item['title'] === $book['title']) {
            return; // Exit early if the item already exists
        }
    }

    // Add book to the cart
    $_SESSION['cart'][] = $book;
}

// FUNCTION: getCart
// Retrieves the cart contents from the session or returns an empty array
// The use of null coalescing (??) comes directly from "Build a no-frills PHP CRUD App with routing – Part 2.pdf"
function getCart() {
    return $_SESSION['cart'] ?? [];
}

// FUNCTION: removeFromCart
// Removes a book from the cart by matching its title
// Uses array loop and unset, which is standard PHP array manipulation, shown across Part 1 + Part 2 CRUD PDFs
function removeFromCart($title) {
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $index => $item) {
            if ($item['title'] === $title) {
                unset($_SESSION['cart'][$index]); // Removes the item
                $_SESSION['cart'] = array_values($_SESSION['cart']); // Re-index the array (recommended in PHP docs and examples)
                break;
            }
        }
    }
}

// FUNCTION: clearCart
// Empties the entire cart by unsetting the session variable
// This was taught in Login with Sessions labsheet under session_destroy and session_unset logic
function clearCart() {
    unset($_SESSION['cart']);
}
?>

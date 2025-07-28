<?php
require_once 'includes/session.php';

require_once 'includes/cart_functions.php';

$cart = getCart();
?>
<?php include "templates/header.php"; ?>

<h2>Your Cart</h2>
<?php if (empty($cart)): ?>
    <p>Your cart is empty.</p>
<?php else: ?>
    <ul>
        <?php foreach ($cart as $item): ?>
            <li>
                <img src="<?= htmlspecialchars($item['image']) ?>" alt="Book" width="50">
                <?= htmlspecialchars($item['title']) ?> - $<?= htmlspecialchars($item['price']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
    <form method="POST" action="appointments/book.php">
        <label>Pick up Date & Time:</label><br>
        <input type="datetime-local" name="datetime" required>
        <button type="submit">Book Appointment</button>
    </form>
<?php endif; ?>
<?php include "templates/footer.php"; ?>
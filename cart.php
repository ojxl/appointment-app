<?php
require_once 'includes/session.php';
require_once 'includes/cart_functions.php';

$cartItems = getCart();
$total = 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <link rel="stylesheet" href="css/style.css"> <!-- link to your existing style -->
</head>
<body>
  <?php include 'templates/header.php'; ?>

  <div class="container">
    <h2>Your Cart</h2>

    <?php if (count($cartItems) > 0): ?>
      <table>
        <thead>
          <tr>
            <th>Book</th>
            <th>Author</th>
            <th>Price</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($cartItems as $item): ?>
            <tr>
              <td><?= htmlspecialchars($item['title']) ?></td>
              <td><?= htmlspecialchars($item['author']) ?></td>
              <td>$<?= number_format($item['price'], 2) ?></td>
            </tr>
            <?php $total += $item['price']; ?>
          <?php endforeach; ?>
        </tbody>
      </table>

      <p><strong>Subtotal:</strong> $<?= number_format($total, 2) ?></p>

      <!-- Book appointment button -->
      <form action="appointments/book.php" method="POST">
        <button type="submit">Book Appointment</button>
      </form>

    <?php else: ?>
      <p>Your cart is empty.</p>
    <?php endif; ?>
  </div>

  <?php include 'templates/footer.php'; ?>
</body>
</html>

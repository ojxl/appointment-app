<?php
// Start the session and bring in cart helper functions
require_once 'src/session.php'; // session check (ref: Login with Sessions labsheet 2023)
require_once 'src/cart_functions.php'; // manages session cart items (ref: cart_functions.php from project)

// Get all cart items using our custom function (ref: SymfonyCasts Ep3 - function logic + sessions)
$cartItems = getCart();
$total = 0; // calculating total here manually since i'm not using a DB yet
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Your Cart</title>
  <!-- Linking existing site CSS -->
  <link rel="stylesheet" href="css/style.css"> 
</head>
<body>
  <?php include 'templates/header.php'; // keeps page layout consistent ?>

  <div class="container">
    <h2>Your Cart</h2>

    <!-- If there are items in the cart, i display them in a table -->
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
          <!-- Loop through each item stored in the cart session (ref: PHP foreach from previous assignments) -->
          <?php foreach ($cartItems as $item): ?>
            <tr>
              <!-- Using htmlspecialchars() for output safety (ref: SymfonyCasts Ep3 - XSS protection) -->
              <td><?= htmlspecialchars($item['title']) ?></td>
              <td><?= htmlspecialchars($item['author']) ?></td>
              <td>$<?= number_format($item['price'], 2) ?></td>
            </tr>
            <?php $total += $item['price']; // add each item's price to total ?>
          <?php endforeach; ?>
        </tbody>
      </table>

      <!-- Show the final subtotal below the table -->
      <p><strong>Subtotal:</strong> $<?= number_format($total, 2) ?></p>

      <!-- Button to proceed to appointment booking (we pass nothing here, session carries cart data) -->
      <form action="appointments/book.php" method="POST">
        <button type="submit">Book Appointment</button>
      </form>

    <?php else: ?>
      <!-- If no items in cart, show a simple message -->
      <p>Your cart is empty.</p>
    <?php endif; ?>
  </div>

  <?php include 'templates/footer.php'; ?>
</body>
</html>

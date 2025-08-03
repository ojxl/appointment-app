<?php
// Start session to access login state and cart data
require_once '../includes/session.php'; // Session handling shown in L6 Cookies & Sessions (pptx)

// Load custom cart helper functions (session-based cart)
require_once '../includes/cart_functions.php'; // This was built using PHP session logic as taught in SymfonyCasts Ep. 3

// Redirect if the cart is empty (basic control flow using session data)
$cartItems = getCart();
if (empty($cartItems)) {
    header("Location: ../cart.php"); // Redirects are from SymfonyCasts Ep. 2 + project lab examples
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Book Appointment</title>
  <!-- Linking to my site's stylesheet (template integration based on lab step: "Frontend template integrated") -->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>
  <!-- Include the site's header (as done in header.php from the lab template setup) -->
  <?php include '../templates/header.php'; ?>

  <div class="container">
    <h2>Schedule Pickup Appointment</h2>

    <!-- Form to let user choose a pickup time and date (based on Forms & Validation lecture + lab day 3) -->
    <form action="confirm.php" method="POST">

      <!-- Date picker input (HTML5 validation shown in Form Validation slides) -->
      <label for="pickup_date">Choose a pickup date:</label><br>
      <input type="date" name="pickup_date" required><br><br>

      <!-- Dropdown list with fixed time values (based on standard form handling, seen in Forms pptx) -->
      <label for="pickup_time">Choose a pickup time:</label><br>
      <select name="pickup_time" required>
        <option value="10:00 AM">10:00 AM</option>
        <option value="12:00 PM">12:00 PM</option>
        <option value="2:00 PM">2:00 PM</option>
        <option value="4:00 PM">4:00 PM</option>
      </select><br><br>

      <!-- Submit button to send appointment form to confirm.php (handled in lab day 6: booking logic) -->
      <button type="submit">Confirm Appointment</button>
    </form>
  </div>

  <!-- Include the site’s footer -->
  <?php include '../templates/footer.php'; ?>
</body>
</html>

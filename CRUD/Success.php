<?php
// Start the session so we can access the saved appointment data
// This is based on the same logic used in login.php and booking system (from L6 Cookies & Sessions.pptx)
require_once '../src/session.php';

// Get the appointment details from the session (set earlier in confirm.php)
$appointment = $_SESSION['appointment'] ?? null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Appointment Confirmed</title>
  <!-- Link to site styling, this was already set up in the base template -->
  <link rel="stylesheet" href="../css/style.css">
</head>
<body>

  <!-- This includes the shared site header (comes from header.php template) -->
  <?php include '../templates/header.php'; ?>

  <div class="container">
    <h2>Appointment Confirmed</h2>

    <!-- If appointment data exists, display the info -->
    <?php if ($appointment): ?>
      <p><strong>Date:</strong> <?= htmlspecialchars($appointment['date']) ?></p>
      <p><strong>Time:</strong> <?= htmlspecialchars($appointment['time']) ?></p>
      <p><strong>Books:</strong></p>
      <ul>
        <!-- Loop through each booked item from the session cart -->
        <?php foreach ($appointment['books'] as $book): ?><!--Forms and form validation.pptx -->
          <!-- Show each book's title and author securely using htmlspecialchars (learned from SymfonyCasts Ep. 3) -->
          <li><?= htmlspecialchars($book['title']) ?> by <?= htmlspecialchars($book['author']) ?></li>
        <?php endforeach; ?>
        <h2>If you wish to edit or delete your appointment, click on My Appointments</h2>
      </ul>
    <?php else: ?>
      <!-- Fallback in case user somehow arrives here without booking -->
      <p>No appointment found.</p>
    <?php endif; ?>
  </div>

  <!-- Shared site footer -->
  <?php include '../templates/footer.php'; ?>
</body>
</html>

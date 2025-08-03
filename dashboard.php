<?php
// This file protects the dashboard from being accessed by non-logged-in users
// Ref: session check adapted from Login with Sessions labsheet 2023
require_once 'includes/session.php';

// Header template to keep the site layout consistent
require_once 'templates/header.php';
?>

<!-- Dashboard layout content starts here -->
<div class="container mt-5">
    <!-- Greet the logged-in user using their session username (Ref: SymfonyCasts Ep3 - using session data) -->
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

    <!-- Inform the user what the dashboard does -->
    <p>This is your dashboard. From here, you'll be able to schedule and view book pickup appointments.</p>

    <!-- Button to create a new appointment and to logout -->
    <!-- Buttons styled using Bootstrap (ref: template + Bootstrap 5.3.1 from HTML header) -->
    <a href="appointments/create.php" class="btn btn-primary">+ Schedule a Pickup</a>
    <a href="auth/logout.php" class="btn btn-secondary">Logout</a>

    <hr>

    <!-- Placeholder for future table of appointments -->
    <h4>Your Upcoming Appointments</h4>
    <p>table for l8r</p>
</div>

<?php
// Include footer 
require_once 'templates/footer.php';
?>

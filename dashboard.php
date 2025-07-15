<?php
// Protect page: only logged-in users can see this
require_once 'auth/session.php';

// Include header
require_once 'templates/header.php';
?>

<div class="container mt-5">
    <h2>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h2>

    <p>This is your dashboard. From here, you'll be able to schedule and view book pickup appointments.</p>

    <a href="appointments/create.php" class="btn btn-primary">+ Schedule a Pickup</a>
    <a href="auth/logout.php" class="btn btn-secondary">Logout</a>

    <hr>

    <h4>Your Upcoming Appointments</h4>
    <p>table for l8r</p>
</div>

<?php
// Include footer
require_once 'templates/footer.php';
?>

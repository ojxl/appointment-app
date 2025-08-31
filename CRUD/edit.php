<?php
// This file lets a user edit one of their own appointments
// Inspired by "Build a no-frills PHP CRUD App with routing - part2" and Summer Brief

require_once '../auth/check.php'; 
require_once '../src/db.php'; 

// Get appointment ID from the URL (query parameter)
$appointment_id = $_GET['id'] ?? null;

// If no ID is given, send user back to their appointments list
if (!$appointment_id) {
    header("Location: view_appointments.php");
    exit();
}

// Prepare a secure SELECT query using PDO (from SymfonyCasts Ep3 & brief requirements)
$stmt = $pdo->prepare("SELECT * FROM appointments WHERE id = :id AND user_id = :user_id");
$stmt->bindParam(':id', $appointment_id, PDO::PARAM_INT);
$stmt->bindParam(':user_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$appointment = $stmt->fetch();


// Check if this appointment belongs to the logged-in user
if (!$appointment) {
    require_once '../templates/header.php'; // Load the page header
    echo "<p>Appointment not found or you do not have permission to edit it.</p>";
    include '../templates/footer.php';
    exit();
}

// If user submitted the form
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the new form values
    $new_date = $_POST['appointment_date'] ?? '';
    $new_time = $_POST['appointment_time'] ?? '';
    $new_notes = $_POST['notes'] ?? '';

    // If required fields are filled
    if ($new_date && $new_time) {
        // Update the appointment in DB using a secure prepared statement (SymfonyCasts + brief)
        $update_sql = "UPDATE appointments 
                       SET appointment_date = :date, appointment_time = :time, notes = :notes 
                       WHERE id = :id AND user_id = :user_id";
        $update_stmt = $pdo->prepare($update_sql);
        $update_stmt->execute([
            ':date' => $new_date,
            ':time' => $new_time,
            ':notes' => $new_notes,
            ':id' => $appointment_id,
            ':user_id' => $_SESSION['user_id'],
        ]);

        // Redirect after update with a success message
        header("Location: view-appointments.php?message=Appointment+updated+successfully");
        exit();
    } else {
        // Validation error
        $error = "<p style='color:red;'>Please fill in both date and time.</p>";
    }
}

require_once '../templates/header.php'; // Load the page header AFTER form handling to prevent header error
?>

<!-- HTML form pre-filled with existing appointment details -->
<div class="container mt-5">
    <h2>Edit Appointment</h2>

    <?php if (isset($error)) echo $error; ?>

    <form method="POST">
        <!-- Date input -->
        <label for="appointment_date">Date:</label><br>
        <input type="date" id="appointment_date" name="appointment_date" 
               value="<?= htmlspecialchars($appointment['appointment_date']) ?>" required><br><br>

        <!-- Time input -->
        <label for="appointment_time">Time:</label><br>
        <input type="time" id="appointment_time" name="appointment_time" 
               value="<?= htmlspecialchars($appointment['appointment_time']) ?>" required><br><br>

        <!-- Optional notes -->
        <label for="notes">Notes (optional):</label><br>
        <textarea name="notes" id="notes"><?= htmlspecialchars($appointment['notes']) ?></textarea><br><br>

        <!-- Submit -->
        <button type="submit" class="btn btn-success">Update Appointment</button>
        <a href="view_appointments.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php require_once '../templates/footer.php'; ?>

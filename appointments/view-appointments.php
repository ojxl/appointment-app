<?php

// This file ensures the user is logged in before accessing this page
require_once '../auth/check.php'; // Auth check is covered in the "Login with Sessions labsheet 2023" and "L6 Cookies Sessions.pptx"

// Include the database connection using PDO (as required by the brief)
require_once '../includes/db.php'; // This follows the structure outlined in SymfonyCasts Ep.3 and the Summer Project Brief

// Load the header template for consistent layout
require_once '../templates/header.php';

// Get the currently logged in user's ID from the session
$user_id = $_SESSION['user_id'];

// Prepare a SQL query to fetch all appointments linked to this user
// PDO is used here with named placeholders (:user_id) to prevent SQL injection
$sql = "SELECT id, appointment_date, appointment_time, notes FROM appointments WHERE user_id = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
$stmt->execute();

// Fetch all matching appointment records as an associative array
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<div class="container mt-5">
    <h2>Your Appointments</h2>

    <?php if (count($appointments) > 0): ?>
        <!-- If appointments exist, display them in a table -->
        <table class="table table-bordered table-hover mt-3">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Notes</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($appointments as $appointment): ?>
                    <tr>
                        <!-- Securely display appointment data using htmlspecialchars to prevent XSS -->
                        <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                        <td><?= htmlspecialchars($appointment['appointment_time']) ?></td>
                        <td><?= htmlspecialchars($appointment['notes']) ?></td>
                        <td>
                            <!-- Provide edit and delete options with confirmation on delete -->
                            <a href="edit.php?id=<?= $appointment['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $appointment['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <!-- Message if no appointments exist -->
        <p class="mt-3">You have no appointments scheduled.</p>
    <?php endif; ?>
</div>

<?php require_once '../templates/footer.php'; ?>

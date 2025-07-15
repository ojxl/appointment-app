<?php
include "templates/header.php"; 
require_once '../auth/check.php';
require_once '../includes/db.php';
require_once '../templates/header.php';
$user_id = $_SESSION['user_id'];

$sql = "SELECT id, appointment_date, appointment_time, notes FROM appointments WHERE user_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<div class="container mt-5">
    <h2>Your Appointments</h2>

    <?php if ($result->num_rows > 0): ?>
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
                <?php while ($appointment = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?= htmlspecialchars($appointment['appointment_date']) ?></td>
                        <td><?= htmlspecialchars($appointment['appointment_time']) ?></td>
                        <td><?= htmlspecialchars($appointment['notes']) ?></td>
                        <td>
                            <a href="edit.php?id=<?= $appointment['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $appointment['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="mt-3">You have no appointments scheduled.</p>
    <?php endif; ?>
</div>

<?php require_once '../templates/footer.php'; ?>
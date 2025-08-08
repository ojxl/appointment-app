<?php

// This file ensures the user is logged in before accessing this page
require_once '../auth/check.php'; // Auth check is covered in the "Login with Sessions labsheet 2023" and "L6 Cookies Sessions.pptx"

// Include the database connection using PDO (as required by the brief)
require_once '../includes/db.php'; // This follows the structure outlined in SymfonyCasts Ep.3 and the Summer Project Brief

// Load the header template for consistent layout
require_once '../templates/header.php';

// Get the currently logged in user's ID from the session
$user_id = $_SESSION['user_id'];

// Get the search term from the URL if it exists
$search = $_GET['search'] ?? ''; // Forms & Form Validation.pptx shows using $_GET for simple filters

// Prepare the base SQL query to fetch all appointments for this user
$sql = "SELECT id, appointment_date, appointment_time, notes, status
        FROM appointments 
        WHERE user_id = :user_id";

// Build parameter array with user ID
$params = [':user_id' => $user_id];

// If the user entered something in the search box, add filtering conditions
if (!empty($search)) {
    // https://www.w3schools.com/sql/sql_like.asp
    $sql .= " AND (
                appointment_date LIKE :searchTerm 
                OR appointment_time LIKE :searchTerm 
                OR notes LIKE :searchTerm
            )";
    $params[':searchTerm'] = "%$search%"; // Add wildcards for LIKE search
}

// Prepare the PDO statement
$stmt = $pdo->prepare($sql);

// Execute the query using parameters array
$stmt->execute($params);

// Fetch all matching appointment records
$appointments = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container mt-5">
    <h2>Your Appointments</h2>

    <!-- Search Form -->
    <form method="GET" class="mb-3">
        <input type="text" name="search" placeholder="Search appointments..." 
               value="<?= htmlspecialchars($search) ?>">
        <button type="submit" class="btn btn-primary">Search</button>
    </form>

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
                            <?php if ($appointment['status'] !== 'completed'): ?>
                            <a href="mark-completed.php?id=<?= $appointment['id'] ?>" class="btn btn-sm btn-success">Mark as Completed</a>
                            <?php else: ?>
                            <span class="badge bg-success">Completed</span>
                            <?php endif; ?>
    
                            <a href="edit.php?id=<?= $appointment['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $appointment['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?');">Delete</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <!-- Message if no appointments exist -->
        <p class="mt-3">No appointments found.</p>
    <?php endif; ?>
</div>

<?php require_once '../templates/footer.php'; ?>

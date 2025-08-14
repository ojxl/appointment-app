<?php

// This file ensures the user is logged in before accessing this page
require_once '../auth/check.php'; // Auth check is covered in the "Login with Sessions labsheet 2023" and "L6 Cookies Sessions.pptx"

// Load the database and appointment classes (instead of doing raw SQL here)
// Reference: Based on OOP refactor approach from "Build a no-frills PHP CRUD App" and 4_Website file structure and MVCs intro.pptx
require_once '../classes/Database.php';
require_once '../classes/Appointment.php';

// Create the database connection using the Database class
$db = new Database();
$pdo = $db->getConnection();

// Create an Appointment object for the logged-in user
$appointmentManager = new Appointment($pdo, $_SESSION['user_id']);

// Get the search term from the URL if it exists
$search = $_GET['search'] ?? ''; // Forms & Form Validation.pptx shows using $_GET for simple filters

// Fetch all appointments for this user (search is handled inside the class)
$appointments = $appointmentManager->getAll($search);

// Load the header template for consistent layout
require_once '../templates/header.php';

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
                                <!-- Button to mark appointment as completed -->
                                <a href="mark-completed.php?id=<?= $appointment['id'] ?>" class="btn btn-sm btn-success">Mark as Completed</a>
                            <?php else: ?>
                                <!-- Badge showing status if already completed -->
                                <span class="badge bg-success">Completed</span>
                            <?php endif; ?>
    
                            <!-- Edit and Delete actions -->
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

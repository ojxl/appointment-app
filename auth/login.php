<?php
include '../templates/header.php'; 
?>

<div class="container">
    <h2>Login</h2>

    <!-- Display error message if passed via URL -->
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

    <form action="login_process.php" method="POST">
        <label for="username">Username or Email:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</div>

<?php include '../templates/footer.php'; ?>

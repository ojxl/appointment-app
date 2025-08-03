<?php
// Include the common site header (used in template layout for consistency across pages)
include '../templates/header.php'; 
?>

<div class="container">
    <h2>Login</h2>

    <!-- If there's an error message passed through the URL, show it to the user -->
    <!-- Using htmlspecialchars to escape characters for safety, which was covered in SymfonyCasts Ep.3 and Part 2 PDF -->
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>

    <!-- Login form that sends data to login-process.php using POST (method shown in Part 2 PDF and Forms slides) -->
    <form action="login-process.php" method="POST">
        <label for="username">Username or Email:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Login</button>
    </form>
</div>

<?php
// Include the common site footer (also shared across pages)
include '../templates/footer.php'; 
?>

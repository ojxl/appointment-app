<?php
// Include the header layout (taken from my own project templates)
include '../templates/header.php';
?>

<div class="container">
    <h2>Create an Account</h2>

    <!-- Display error or success messages from the URL -->
    <?php if (isset($_GET['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
    <?php if (isset($_GET['success'])): ?>
        <p style="color: green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
    <?php endif; ?>

    <!-- Simple registration form -->
    <!-- Built using structure from "Forms and Form Validation.pptx" -->
    <form action="register-process.php" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" name="username" id="username" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" name="password" id="password" required><br><br>

        <button type="submit">Register</button>
    </form>
</div>

<?php
// Include footer layout
include '../templates/footer.php';
?>

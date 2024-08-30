<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="../static/style.css">
</head>
<body>
    <h2>Login</h2>
    <a href="register.php">resgistar</a>
    
    <form action="../public/login.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>
</body>
</html>

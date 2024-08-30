<?php
session_start();
require_once '../config/Database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $database = new Database();
    $db = $database->connect();

    $query = "INSERT INTO users (username, password) VALUES (:username, :password)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
        header('Location: ../views/login.php');
        exit;
    } else {
        header('Location: ../views/register.php?error=Could not register user');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register</title>
    <link rel="stylesheet" href="../static/style.css">
</head>
<body>
    <h2>Register</h2>
    <form action="register.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Register</button>
    </form>
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;"><?php echo $_GET['error']; ?></p>
    <?php endif; ?>
</body>
</html>

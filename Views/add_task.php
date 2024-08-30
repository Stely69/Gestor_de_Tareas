<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Task</title>
    <link rel="stylesheet" href="../static/style.css">
</head>
<body>
    <h2>Add New Task</h2>
    <form action="../public/add_task.php" method="POST">
        <label for="title">Title:</label>
        <input type="text" name="title" required><br><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br><br>
        <button type="submit">Add Task</button>
    </form>
</body>
</html>

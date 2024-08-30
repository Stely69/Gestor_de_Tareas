<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

require_once '../controllers/TaskController.php';

$taskController = new TaskController();
$tasks = $taskController->getTasks($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Task List</title>
    <link rel="stylesheet" href="../static/style.css">
</head>
<body>
    <h1>Your Tasks</h1>
    <ul>
        <?php foreach($tasks as $task): ?>
            <li><?php echo $task['title']; ?> - <?php echo $task['description']; ?>
                <a href="../public/delete_task.php?id=<?php echo $task['id']; ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="add_task.php">Add New Task</a>
    <a href="../public/logout.php">Logout</a>
</body>
</html>

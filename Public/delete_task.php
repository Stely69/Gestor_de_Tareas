<?php
require_once '../controllers/TaskController.php';

if(isset($_GET['id'])) {
    $taskController = new TaskController();
    $taskController->deleteTask($_GET['id']);
}

header('Location: ../views/tasks.php');
exit;


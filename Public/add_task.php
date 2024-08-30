<?php
session_start();
require_once '../config/Database.php';

// Verificar que el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    header('Location: ../views/login.php');
    exit;
}

// Verificar que el formulario haya sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $user_id = $_SESSION['user_id'];

    // Conectar a la base de datos
    $database = new Database();
    $db = $database->connect();

    // Preparar y ejecutar la consulta para insertar la tarea
    $query = "INSERT INTO tasks (title, description, user_id) VALUES (:title, :description, :user_id)";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':title', $title);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':user_id', $user_id);

    if ($stmt->execute()) {
        // Redirigir al usuario de vuelta a la lista de tareas
        header('Location: ../views/tasks.php');
        exit;
    } else {
        // Redirigir al usuario de vuelta al formulario de añadir tarea con un mensaje de error
        header('Location: ../views/add_task.php?error=Could not add task');
        exit;
    }
}


<?php
session_start();
require_once '../config/Database.php';

// Verificar que el formulario haya sido enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Conectar a la base de datos
    $database = new Database();
    $db = $database->connect();

    // Preparar y ejecutar la consulta para buscar el usuario
    $query = "SELECT * FROM users WHERE username = :username LIMIT 1";
    $stmt = $db->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar que el usuario existe y la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        // Redirigir al usuario a la página de tareas
        header('Location: ../views/tasks.php');
        exit;
    } else {
        // Redirigir al usuario de vuelta al login con un mensaje de error
        header('Location: ../views/login.php?error=Invalid username or password');
        exit;
    }
}


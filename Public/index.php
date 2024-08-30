<?php
session_start();
$_SESSION['user_id'] = 1;  // Suponiendo que el usuario ya ha iniciado sesión

header('Location: ../views/tasks.php');
exit;


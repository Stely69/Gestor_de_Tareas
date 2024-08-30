<?php
class Database {
    // Parámetros de conexión
    private $host = 'localhost';
    private $db_name = 'task_manager';
    private $username = 'root';
    private $password = '';
    private $conn;

    // Método para conectar a la base de datos
    public function connect() {
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch(PDOException $e) {
            echo 'Error de Conexión: ' . $e->getMessage();
        }

        return $this->conn;
    }
}


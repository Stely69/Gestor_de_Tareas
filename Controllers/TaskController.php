<?php
require_once '../models/Task.php';
require_once '../Config/Database.php';

class TaskController {
    private $db;
    private $task;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
        $this->task = new Task($this->db);
    }

    public function createTask($title, $description, $user_id) {
        $this->task->title = $title;
        $this->task->description = $description;
        $this->task->user_id = $user_id;

        if($this->task->create()) {
            echo "Task created successfully.";
        } else {
            echo "Error creating task.";
        }
    }

    public function getTasks($user_id) {
        $this->task->user_id = $user_id;
        $result = $this->task->read();

        $tasks = array();
        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            array_push($tasks, $row);
        }

        return $tasks;
    }

    public function deleteTask($id) {
        $this->task->id = $id;
        if($this->task->delete()) {
            echo "Task deleted successfully.";
        } else {
            echo "Error deleting task.";
        }
    }
}

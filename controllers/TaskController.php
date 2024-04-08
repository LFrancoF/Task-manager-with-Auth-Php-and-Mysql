<?php

require_once "models/Task.php";

class TaskController{
    public function index(){
        $task = new Task();
        $task->setIdUsuario($_SESSION["user"]->id_usuario);
        $tasks = $task->getTareas();
        require_once "views/tasks/index.php";
    }

    public function create(){
        require_once "views/tasks/createTask.php";
    }

    public function edit(){
        require_once "views/tasks/editTask.php";
    }

    public function save($taskdata){
        
        $name = $taskdata["name"];
        $description = $taskdata["description"];
        $idUser = $_SESSION["user"]->id_usuario;

        $task = new Task();
        $task->setIdUsuario($idUser);
        $task->setNombre($name);
        $task->setDescripcion($description);
        $result = $task->create();

        return $result;

    }

    public function getTask($id){
        
        //primero obtenemos la tarea con el id para obtener todos sus datos
        $taskQuery = new Task();
        $taskQuery->setIdTarea($id);
        $task = $taskQuery->getTarea();

        //luego guardamos los datos de la tarea en la variable de session
        $_SESSION["task"] = $task;
        return $task;

    }

    public function update($taskdata){
        $id = $_SESSION["task"]->id_tarea;
        $name = $taskdata["name"];
        $description = $taskdata["description"];

        $task = new Task();
        $task->setIdTarea($id);
        $task->setNombre($name);
        $task->setDescripcion($description);
        $result = $task->edit();
        if($result)
            unset($_SESSION['task']);
        return $result;

    }

    public function delete($id){
        $task = new Task();
        $task->setIdTarea($id);

        $result = $task->delete();

        return $result;

    }
}
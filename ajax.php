<?php
if(!session_id())
    session_start();
require_once "config/db.php";
require_once "controllers/TaskController.php";
require_once "controllers/UserController.php";

//crear tarea
if(isset($_POST["taskdataCreate"])){
    $taskdata = $_POST["taskdataCreate"];
    $taskController = new TaskController();
    $result = $taskController->save($taskdata);
    if ($result){
        echo json_encode("Tarea creada exitosamente");
    }else{
        echo json_encode("Error al crear tarea");
    }
}

//obtener tarea
if(isset($_POST["idEdit"])){
    $id = $_POST["idEdit"];
    $taskController = new TaskController();
    $result = $taskController->getTask($id);
    if (!empty($result)){
        echo $result;
    }
}

//editar tarea
if(isset($_POST["taskdataEdit"])){
    $taskdata = $_POST["taskdataEdit"];
    $taskController = new TaskController();
    $result = $taskController->update($taskdata);
    if ($result){
        echo json_encode("Tarea editada exitosamente");
    }else{
        echo json_encode("Error al editar tarea");
    }
}

//eliminar tarea
if(isset($_POST["idDelete"])){
    $id = $_POST["idDelete"];
    $taskController = new TaskController();
    $result = $taskController->delete($id);
    if ($result){
        echo json_encode("1");
    }else{
        echo json_encode("0");
    }
}

//cerrar sesion
if(isset($_POST["logout"])){
    $taskdata = $_POST["taskdataCreate"];
    $user = new UserController();
    $result = $user->logout();
    if ($result){
        echo json_encode("1");
    }else{
        echo json_encode("0");
    }
}
<?php

class Task{
    private $idTarea;
    private $idUsuario;
    private $nombre;
    private $descripcion;
    private $db;

    public function __construct(){
        $this->db = new Connection();
    }

    function getidTarea(){
        return $this->idTarea;
    }

    function getidUsuario(){
        return $this->idUsuario;
    }

    function getNombre(){
        return $this->nombre;
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function setIdTarea($id){
        $this->idTarea = $id;
    }

    function setIdUsuario($id){
        $this->idUsuario = $id;
    }

    function setNombre($nombre){
        $this->nombre = $nombre;
    }

    function setDescripcion($descripcion){
        $this->descripcion = $descripcion;
    }

    public function create(){
        $database = $this->db->connect();
        $idUsuario = $this->idUsuario;
        $nombre = $this->nombre;
        $descripcion = $this->descripcion;

        $sql = "INSERT INTO tarea VALUES(null, '$idUsuario', '$nombre', '$descripcion')";
        $query = $database->prepare($sql);
        $result = $query->execute();
        $this->db->close();
        return $result;

    }

    public function getTareas(){
        $database = $this->db->connect();
        $idUsuario = $this->idUsuario;

        $sql = "SELECT * FROM tarea WHERE id_usuario=$idUsuario";
        $query = $database->prepare($sql);
        $query->execute();
        $tasks = $query->fetchAll();
        $this->db->close();
        return $tasks;
    }

    public function getTarea(){
        $database = $this->db->connect();
        $idTarea = $this->idTarea;

        $sql = "SELECT * FROM tarea WHERE id_tarea=$idTarea";
        $query = $database->prepare($sql);
        $query->execute();
        $task = $query->fetch(PDO::FETCH_OBJ);
        $this->db->close();
        return $task;
    }

    public function edit(){
        $database = $this->db->connect();
        $idTarea = $this->idTarea;
        $nombre = $this->nombre;
        $descripcion = $this->descripcion;

        $sql = "UPDATE tarea SET nombre='$nombre', descripcion='$descripcion' WHERE id_tarea='$idTarea'";
        $query = $database->prepare($sql);
        $result = $query->execute();
        $this->db->close();
        return $result;

    }

    public function delete(){
        $database = $this->db->connect();
        $id = $this->idTarea;
        $sql = "DELETE FROM tarea WHERE id_tarea=$id";
        $query = $database->prepare($sql);
        $result = $query->execute();
        $this->db->close();
        return $result;
    }

}
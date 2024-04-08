<?php

class User{
    private $idUsuario;
    private $username;
    private $email;
    private $password;
    private $db;

    public function __construct(){
        $this->db = new Connection();
    }

    function getIdUsuario(){
        return $this->idUsuario;
    }
    function getUsername(){
        return $this->username;
    }
    function getEmail(){
        return $this->email;
    }
    function getPassword(){
        return $this->password;
    }

    function setIdUsuario($id){
        $this->idUsuario = $id;
    }
    function setUsername($username){
        $this->username = $username;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setPassword($password){
        $this->password = $password;
    }

    public function login(){
        $database = $this->db->connect();
        $email = $this->email;
        $password = $this->password;

        $sql = "SELECT * FROM usuario WHERE email='$email'";
        $query = $database->prepare($sql);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_OBJ);
        $this->db->close();

        if ($user && password_verify($password, $user->password)){
            return $user;
        }
        return null;
        
    }

    public function getUsuarioByEmail(){
        $database = $this->db->connect();
        $email = $this->email;

        $sql = "SELECT * FROM usuario WHERE email='$email'";
        $query = $database->prepare($sql);
        $query->execute();
        $user = $query->rowCount();
        $this->db->close();
        return $user;
    }

    public function save(){
        $database = $this->db->connect();
        $username = $this->username;
        $email = $this->email;
        $password = password_hash($this->password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO usuario VALUES(null, '$username', '$email', '$password')";
        $query = $database->prepare($sql);
        $result = $query->execute();
        $this->db->close();
        return $result;

    }

}
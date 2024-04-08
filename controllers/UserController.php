<?php

require_once "models/User.php";

class UserController{
    public function index(){
        echo "Controlador de Usuario - index";
    }

    public function login(){
        if(isset($_POST)){
            $user = new User();
            $user->setEmail($_POST["email"]);
            $user->setPassword($_POST["password"]);
            $userLoged = $user->login();
            

            //creamos la sesion
            if ($userLoged && is_object($userLoged)){
                //eliminamos los mensajes de error
                if(isset($_SESSION['error_login'])){
                    unset($_SESSION['error_login']);
                }
                if(isset($_SESSION['error_register'])){
                    unset($_SESSION['error_register']);
                }
                $_SESSION["user"] = $userLoged;
                header("Location:".ROOT."task/index");
            }else{
                $_SESSION['error_login'] = "Datos incorrectos";
                header("Location:".ROOT."login/");
            }
        }
        
    }

    public function logout(){
        if(isset($_SESSION['user'])){
            unset($_SESSION['user']);
            return true;
        }
        return false;
    }

    public function register(){
        if(isset($_POST)){
            $username = isset($_POST['username']) ? $_POST['username'] : false;
            $email = isset($_POST['email']) ? $_POST['email'] : false;
            $password = isset($_POST['password']) ? $_POST['password'] : false;

            if($username && $email && $password){
                $usuario = new User();
                $usuario->setUsername($username);
                $usuario->setEmail($email);
                $usuario->setPassword($password);

                //verificamos si el email ya existe en la bd
                $userfound = $usuario->getUsuarioByEmail();

                if ($userfound == 1) {
                    $_SESSION['error_register'] = "Error, el email ya existe";
                    header("Location:".ROOT."register/");
                }else{
                    //guardar en la base de datos
                    $save = $usuario->save();
                    if ($save) {
                        //registro completado, y redireccionamos a login y borramos mensajes de error
                        if(isset($_SESSION['error_register'])){
                            unset($_SESSION['error_register']);
                        }
                        if(isset($_SESSION['error_login'])){
                            unset($_SESSION['error_login']);
                        }
                        header("Location:".ROOT."login/");
                        
                    }else{
                        $_SESSION['error_register'] = "Error al registrar";
                        header("Location:".ROOT."register/");
                    }
                }
            }else{
                $_SESSION['error_register'] = "Error al registrar";
                header("Location:".ROOT."register/");
            }
        }else{
            $_SESSION['error_register'] = "Error al registrar";
            header("Location:".ROOT."register/");
        }  
    }
}
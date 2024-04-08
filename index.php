<?php 

session_start();

require_once "autoload.php";
define("ROOT","http://localhost/Task_manager/");
require_once "config/db.php";
require_once "views/layouts/header.php";


//login
if(isset($_GET['controller']) && ucfirst($_GET['controller'])=="Login"){
    if(!isset($_SESSION["user"])){
        $login = new LoginController();
        $login->index();
    }else{
        header("Location:".ROOT);
    }
}

//Registro
if(isset($_GET['controller']) && ucfirst($_GET['controller'])=="Register"){
    require_once "views/register.php";
}


if(isset($_GET['controller']) && class_exists(ucfirst($_GET['controller']).'Controller')){
    $controller_name= ucfirst($_GET['controller']).'Controller';
    $controller = new $controller_name();
    if(($_GET['action']=="")){
        $controller->index();
    }else{
        if(method_exists($controller, $_GET['action'])){
            $action = $_GET['action'];
            $controller->$action();
        }else{
            showError();
        }
    }
}elseif(!isset($_GET['controller']) && !isset($_GET['action'])){
    //si no hay nada en la url, redireccionaremos a la pagina al login si no esta logeado
    if(!isset($_SESSION["user"])){
        header("Location:".ROOT."login/");
    }else{
        header("Location:".ROOT."task/index");
    }
    }else{
        showError();
    }

//Error de pagina
function showError(){
    $error = new ErrorController();
    $error->index();
}

require_once "views/layouts/footer.php";
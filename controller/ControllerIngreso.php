<?php
require_once('model/ModelIngreso.php');
require_once('view/ViewIngreso.php');
include_once('helpers/auth.helper.php');
class ControladorIngreso{ 
    private $model;
    private $view;
    public function __construct(){
        $this->authHelper = new AuthHelper();
        $this->model = new ModelIngreso();
        $this->view = new ViewIngreso();
      
    }
    
    function mostrarLogin($error=null){
        $categorias = $this->authHelper->obtenerCategorias();
        $this->view->showLoginForm($categorias,$error);
    }
    
    function login(){
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
        }
        $userData = $this->model->getUserData($usuario);
        if ($usuario && password_verify($password, $userData->password)){
            $_SESSION['USER_ID'] = $userData->id;
            $_SESSION['USER_EMAIL'] = $userData->email;
            $_SESSION['LAST_ACTIVITY'] = time();
            header("Location: " . ADMIN);
        } else {
            $this->mostrarLogin("Usuario y/o contraseña inválidos");
        }
    }
    function seccionRegistro(){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $categorias = $this->authHelper->obtenerCategorias();
        $this->view->mostrarFormRegistro($categorias);
        $_SESSION['LAST_ACTIVITY'] = time();

    }
    function crearUsuario(){
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        if($_REQUEST['password-1'] != $_REQUEST['password-2']){
            $this->view->mostrarFormRegistro(null,"Las contraseñas no coinciden");
            die;
        }
        $password = password_hash($_REQUEST['password-1'], PASSWORD_DEFAULT);
        $usuario = $_REQUEST['usuario'];
        $this->model->crearUsuario($password,$usuario);
        $_SESSION['LAST_ACTIVITY'] = time();
        header("Location: " . ADMIN);
    }
    
}
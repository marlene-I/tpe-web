<?php
require_once('model/ModelIngreso.php');
require_once('view/ViewIngreso.php');
include_once('helpers/auth.helper.php');
class ControladorIngreso{ 
    private $model;
    private $view;
    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new ModelIngreso();
        $this->view = new ViewIngreso();
      
    }
    
    function showLogin()
    {
        $categorias = $this->authHelper->obtenerCategorias();
        $this->view->showLoginForm($categorias);
    }
    function login()
    {
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
        }
        $userData = $this->model->getUserData($usuario);
        if ($usuario && password_verify($password, $userData->password)) {
            /* session_start(); */
            $_SESSION['USER_ID'] = $userData->id;
            $_SESSION['USER_EMAIL'] = $userData->email;
            $_SESSION['LAST_ACTIVITY'] = time();
            header("Location: " . ADMIN);
        } else {
            $this->showLogin(null,"Usuario y/o contraseña inválidos");
        }
    }
    
}
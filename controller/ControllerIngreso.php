<?php
require_once('model/ModelIngreso.php');
require_once('view/ViewIngreso.php');
include_once('helpers/auth.helper.php');
require_once('model/ModelCateg.php');

class ControladorIngreso{ 
    private $model;
    private $view;
    private $modelCateg;
    public function __construct(){
        $this->authHelper = new AuthHelper();
        $this->model = new ModelIngreso();
        $this->view = new ViewIngreso();
        $this->modelCateg = new ModelCateg();
    }
    
    function mostrarLogin($error=null){
        $categorias = $this->modelCateg->obtenerCategorias();
        $this->view->showLoginForm($categorias,$error);
    }
    
    function login(){
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
        }
        $userData = $this->model->getUserData($usuario);
        if ($usuario && password_verify($password, $userData->password)){
            $this->authHelper->login($userData);
            header("Location: " . ADMIN);
        } else {
            $this->mostrarLogin("Usuario y/o contraseña inválidos");
        }
    }
    function seccionRegistro(){
        // $this->authHelper->checkLogin();
        // $this->authHelper->checkActivity();
        $categorias = $this->modelCateg->obtenerCategorias();
        $this->view->mostrarFormRegistro($categorias);
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
        header("Location: " . ADMIN);
    }
    
}
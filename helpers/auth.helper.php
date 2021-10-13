<?php
require_once('model/Model.php');

class AuthHelper {
    private $model;

    public function __construct(){
        $this->model = new Model();

    }

    function checkLogin(){
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . LOGIN);
        }
    }

    function checkActivity(){ 
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 120)) { /* Desloguea en 2 minutos */
                $this->logout();
        }
    }

    function logout(){
        session_destroy();
        header("Location: " . BASE_URL);
    }
    
    function obtenerCategorias(){ //Se agrega para dar acceso al Controller Ingreso
        $categorias = $this->model->obtenerSoloCategorias();
        return $categorias;
    }
}

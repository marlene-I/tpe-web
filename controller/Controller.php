<?php
require_once('model/Model.php');
require_once('view/View.php');
class Controlador{
    private $model;
    private $view;
    public function __construct(){
        $this->model=new Model();
        $this->view = new View(); 
    }

    function renderHome(){   
        $producto = $this->model->obtenerTodosLosDatos();
        $categoria = $this->model->obtenerSoloCategorias();
     
        $this->view->Home($producto, $categoria);
    }
    
    function filtradoCategorias($categoria){
        $categorias= $this->model->obtenerSoloCategorias();
        $filtroCategorias = $this->model->filtrarCategorias($categoria);
        $this->view->Home($filtroCategorias, $categorias);      
    }
    function seccionAdmin(){
        $producto = $this->model->obtenerTodosLosDatos();
        $categorias= $this->model->obtenerSoloCategorias();
        $this->view->admin($categorias, $producto);
    }
    function agregar(){
        $producto = $_GET['producto'];
        $precio = $_GET['precio'];
        $detalle = $_GET['detalle'];
        $categoria = $_GET['categoria'];
        var_dump($categoria);
        $this->model->agregar($producto, $precio, $detalle, $categoria);
     
        header("Location: ". BASE_URL."admin"); 

    }
    function borrardatos($id){
        $borrar = $this->model->borrar($id);
        $this->view->borrarr($borrar);      
        $this->seccionAdmin();
        header("Location: ". BASE_URL."admin"); 

    }
    function modificar($id){
        $categorias = $this->model->obtenerSoloCategorias();
        /* var_dump($categorias);
        echo "<br>". $categorias[0]->nombre; */
        $this->view->datos($id, $categorias);
     }
     function confirmform(){
         $producto = $_REQUEST['producto'];
         $precio = $_REQUEST['precio'];
         $detalle = $_REQUEST['detalle'];
         $categoria = $_REQUEST['categoria'];
         $id = $_REQUEST['id'];
         /* var_dump($categoria,$id); */
         $modificar = $this->model->modificar($producto, $precio, $detalle, $id,$categoria);
         if($modificar){
             header("Location: " . BASE_URL ."admin");
         }
        }
    function showLogin(){
         $this->view->showLoginForm();
        }
    function login(){ 
        if(!empty($_POST['usuario']) && !empty($_POST['password'])){
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
        }
            $userData = $this->model->getUserData($usuario);
            if($usuario && password_verify($password,$userData->password)){
                echo "Acceso exitoso";
            }else {
                echo "Acceso denegado";
            }

        }
    
    function detalleProducto(){

    }
}

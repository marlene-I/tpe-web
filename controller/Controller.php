<?php
require_once('model/Model.php');
require_once('view/View.php');
class Controlador
{
    private $model;
    private $view;
    public function __construct()
    {
        $this->model = new Model();
        $this->view = new View();
        session_start();
    }

    function renderHome()
    {
        $producto = $this->model->obtenerTodosLosDatos();
        $categoria = $this->model->obtenerSoloCategorias();

        $this->view->Home($producto, $categoria);
    }

    function filtradoCategorias($categoria)
    {
        $categorias = $this->model->obtenerSoloCategorias();
        $filtroCategorias = $this->model->filtrarCategorias($categoria);
        $this->view->Home($filtroCategorias, $categorias);
    }
    function detalleProducto()
    {
    }
    function seccionAdmin()
    {
        $this->checkLogin();
        $this->checkActivity();
        $producto = $this->model->obtenerTodosLosDatos();
        $categorias = $this->model->obtenerSoloCategorias();
        $this->view->admin($categorias, $producto);
        $_SESSION['LAST_ACTIVITY'] = time();
        
    }
    function agregar()
    {
        $this->checkLogin();
        $this->checkActivity();
        $producto = $_GET['producto'];
        $precio = $_GET['precio'];
        $detalle = $_GET['detalle'];
        $categoria = $_GET['categoria'];
        var_dump($categoria);
        $this->model->agregar($producto, $precio, $detalle, $categoria);
        $_SESSION['LAST_ACTIVITY'] = time();

        header("Location: " . ADMIN);
    }
    function borrardatos($id)
    {
        $this->checkLogin();
        $this->checkActivity();
        $borrar = $this->model->borrar($id);
        $this->view->borrarr($borrar);
        $this->seccionAdmin();
        $_SESSION['LAST_ACTIVITY'] = time();

        header("Location: " . ADMIN);
    }
    function modificar($id)
    {
        $this->checkLogin();
        $this->checkActivity();
        $categorias = $this->model->obtenerSoloCategorias();
        /* var_dump($categorias);
        echo "<br>". $categorias[0]->nombre; */
        $this->view->datos($id, $categorias);
        $_SESSION['LAST_ACTIVITY'] = time();

    }
    function confirmform()
    {
        $this->checkLogin();
        $this->checkActivity();
        $producto = $_REQUEST['producto'];
        $precio = $_REQUEST['precio'];
        $detalle = $_REQUEST['detalle'];
        $categoria = $_REQUEST['categoria'];
        $id = $_REQUEST['id'];
        $_SESSION['LAST_ACTIVITY'] = time();
        /* var_dump($categoria,$id); */
        $modificar = $this->model->modificar($producto, $precio, $detalle, $id, $categoria);
        if ($modificar) {
            header("Location: " . ADMIN);
        }
    }
    function showLogin()
    {
        $this->view->showLoginForm();
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
            $this->view->showLoginForm("Usuario y/o contraseña inválidos");
        }
    }
    function checkLogin()
    {
       /*  session_start(); */
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . LOGIN);
        }
    }
    function checkActivity()
    {
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 120)) { /* Desloguea en 2 minutos */
                $this->logout();
        }
    }


    function logout()
    {
        /* session_start(); */
        /* $_SESSION['USER_ID'] = null; En caso de querer borrar SOLO los datos de ingreso del usuario
        $_SESSION['USER_EMAIL'] = null; */
        session_destroy();
        header("Location: " . BASE_URL);
    }
}

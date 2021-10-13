<?php
require_once('model/Model.php');
require_once('view/View.php');
include_once('helpers/auth.helper.php');
class Controlador
{
    private $model;
    private $view;
    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->model = new Model();
        $this->view = new View();
        session_start();
    }

    function renderHome()
    {
        $this->authHelper->checkActivity();
        $producto = $this->model->obtenerTodosLosDatos();
        $categoria = $this->model->obtenerSoloCategorias();
        $_SESSION['LAST_ACTIVITY'] = time();
        $this->view->Home($producto, $categoria);
    }

    function filtradoCategorias($categoria)
    {
        $categorias = $this->model->obtenerSoloCategorias();
        $filtroCategorias = $this->model->filtrarCategorias($categoria);
        $this->view->Home($filtroCategorias, $categorias);
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    function detalleProducto($id)
    {
        $this->authHelper->checkActivity();
        $infoProducto = $this->model->obtenerInfoProducto($id);
        $nombre = $infoProducto[0]->nombre;
        $categoria = $infoProducto[0]->nombre_categoria;
        $precio = $infoProducto[0]->precio;
        $detalle  = $infoProducto[0]->detalle;
        $this->view->mostrarDetalle($nombre, $categoria, $precio, $detalle);
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    function seccionAdmin()
    {
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $producto = $this->model->obtenerTodosLosDatos();
        $categorias = $this->model->obtenerSoloCategorias();
        $this->view->admin($categorias, $producto);
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    function seccionRegistro(){
        $categorias = $this->model->obtenerSoloCategorias();
        $this->view->mostrarFormRegistro($categorias);

    }
    function agregar()
    {
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        if (isset($_GET['nombre_categoria'])) {
            $categoria = $_GET['nombre_categoria'];
            $this->model->agregarCategoria($categoria);
        } else {
            $producto = $_GET['producto'];
            $precio = $_GET['precio'];
            $detalle = $_GET['detalle'];
            $categoria = $_GET['categoria'];
            $this->model->agregar($producto, $precio, $detalle, $categoria);
        }

        $_SESSION['LAST_ACTIVITY'] = time();

        header("Location: " . ADMIN);
    }
    function borrardatos($id)
    {
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        if (isset($_GET['nombre_categoria'])) {
            $categoria = $_GET['nombre_categoria'];
            $this->model->borrarCategoria($categoria);
        }
        $borrar = $this->model->borrar($id);
        /* $this->view->borrarr($borrar); */
        $this->seccionAdmin();
        $_SESSION['LAST_ACTIVITY'] = time();
        /* header("Location: " . ADMIN); */
    }
    function modificar($id)
    {
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $categorias = $this->model->obtenerSoloCategorias();
        /* var_dump($categorias);
        echo "<br>". $categorias[0]->nombre; */
        $this->view->datos($id, $categorias);
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    function confirmform()
    {
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
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

    function showCategorias()
    {
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $categorias = $this->model->obtenerSoloCategorias();
        $this->view->mostrarCategorias($categorias);
    }
    function modificarCategorias($id)
    {
        $this->authHelper->checkLogin();
        $this->authHelper->checkActivity();
        $this->view->mostrarFormCategorias($id);
    }
    function confirmarModificacion(){
        echo "aca";
        $newCat = $_REQUEST['categoria'];
        $id = $_REQUEST['id'];
        $this->model->modificarCategoria($newCat, $id);
        $_SESSION['LAST_ACTIVITY'] = time();
        header("Location: " . ADMIN." /modificarCategorias");
    }
    function borrarCategoria($id){
        $this->model->borrarCategoria($id);
        header("Location: " . ADMIN." /modificarCategorias");

    }

}

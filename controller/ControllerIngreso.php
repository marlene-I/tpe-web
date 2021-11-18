<?php
require_once('model/UserModel.php');
require_once('view/ViewIngreso.php');
include_once('helpers/auth.helper.php');
require_once('model/CategoryModel.php');


class ControladorIngreso
{
    private $userModel;
    private $view;
    private $viewApi;

    private $categoryModel;
    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->userModel = new UserModel();
        $this->view = new ViewIngreso();
        $this->categoryModel = new CategoryModel();
    }

    function mostrarLogin($error = null){
        $categorias = $this->modelCateg->obtenerCategorias();
        $this->view->showLoginForm($categorias, $error);
    }

    function login(){
        if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
            $usuario = $_POST['usuario'];
            $password = $_POST['password'];
            $userData = $this->userModel->getUserData($usuario);
            if (!empty($userData) && password_verify($password, $userData->password)){
                $this->authHelper->login($userData);
                header("Location: " . BASE_URL);
            } else {
                $this->mostrarLogin("Usuario y/o contraseña inválidos");
            }
        }else{
            $this->mostrarLogin("Ingrese usuario y contraseña");
        }
        
    }

    function seccionRegistro($error=null){
        $categorias = $this->modelCateg->obtenerCategorias();
        $this->view->mostrarFormRegistro($categorias, $error);
    }

    function logout(){
        $this->authHelper->logout();
    }

    function accesoDenegado(){
        $this->view->accesoDenegado();
    }

    function createUser(){
        if ($_REQUEST['password-1'] != $_REQUEST['password-2']) {
            $this->seccionRegistro("Las contraseñas no coinciden");
            die;
        }

        $password = password_hash($_REQUEST['password-1'], PASSWORD_DEFAULT);
        $usuario = $_REQUEST['usuario'];
        $nombre = $_REQUEST['nombre'];
        $id = $this->userModel->insert($password, $usuario, $nombre); //Registro
        if ($id) { //Si se devuelve un id lo loguea
            $userData = $this->userModel->getUserData($usuario);
            $this->authHelper->login($userData);
        } else {
            $this->seccionRegistro("Error");
        }
        header("Location: " . BASE_URL);
    }

    function seccionUsuarios(){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        $users = $this->userModel->getAll();
        $categorias = $this->modelCateg->obtenerCategorias();
        if ($users) {
            $this->view->showUserAdmin($users, null, $categorias);
        } else {
            $this->view->showUserAdmin(NULL, NULL, "ERROR 404");
        }
    }

    function checkUserID($user_id, $users = null){ ///***CHECK no me gusta el flujo creo que se puede mejorar */
        if (!$users) {
            $users = $this->userModel->getAll();
        }
        if ($users) { //Chequea que hayan sido devueltos de la DB??
            foreach ($users as $i => $user) {
                if ($user->id == $user_id) {
                    return $user_id;
                }
            }
            return null;
        }
    }
    
    function cambiarRol(){   $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $user_id = $_REQUEST['user-id'];
        $rol_id = $_REQUEST['rol-id'];
        $users = $this->userModel->getAll();
        $user_id = $this->checkUserID($user_id, $users);

        if ($user_id) {
            $this->userModel->setRole($user_id, $rol_id);
            $this->seccionUsuarios(); //**CHECK está OK pedir devuelta los usuarios a la DB ??? */
        } else {
            $this->view->showUserAdmin(null, null, "Error usuario no existe");
        }
        // }else{
        //     $this->view->showUserAdmin(Null, null,null, "Error acceso denegado");
        // }
    }
    /*    function checkAdmins($users=null){
        $adminsCounter = 0;
        if(!$users){
            $users = $this->userModel->getAll();
        }
        if($users){ //Chequea que los usuarios fueron devueltos por la DB **CHECK** redundante??
            foreach ($users as $i => $user) {
                if($user->id_rol == 1){
                    $adminsCounter++;
                }
            }
        }
        return $adminsCounter;
    } */
    function delete($user_id)
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        
        $user_id = $this->checkUserID($user_id);
        if ($user_id) {
            $this->userModel->delete($user_id);
            header("Location: " . USERS);
        }
    }
}

<?php
require_once('model/UserModel.php');
require_once('view/AccessView.php');
include_once('helpers/auth.helper.php');
require_once('model/CategoryModel.php');
require_once('view/ErrorView.php');


class UserAdminController
{
    private $userModel;
    private $accessView;
    private $errorView;
    private $categoryModel;
    public function __construct()
    {
        $this->authHelper = new AuthHelper();
        $this->errorView = new ErrorView();
        $this->userModel = new UserModel();
        $this->accessView = new AccessView();
        $this->categoryModel = new CategoryModel();
    }

    // Funciones de Renderizado

    function renderLogin($error = null){
        $categories = $this->categoryModel->getAll();
        $this->accessView->showLoginForm($categories, $error);
    }

    function renderRegister($error=null){
        $categories = $this->categoryModel->getAll();
        $this->accessView->renderRegisterForm($categories, $error);
    }

    function renderUsersAdmin(){
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        $users = $this->userModel->getAll();
        $categories = $this->categoryModel->getAll();
        if ($users) {
            $this->accessView->renderUserAdmin($users, $categories);
        } else {
            $this->errorView->render("Error 404", $categories);
        }
    }

    function renderDeniedAccess(){ //Función específica para redireccionar desde el helper
        $this->errorView->render("Acceso denegado");
    }
    

    function login(){
        if (!empty($_POST['usuario']) && !empty($_POST['password']) 
        && isset($_POST['usuario']) && isset($_POST['password'])) {
            $user = $_POST['usuario'];
            $password = $_POST['password'];
            $userData = $this->userModel->getUserData($user);

            if (!empty($userData) && password_verify($password, $userData->password)){

                $this->authHelper->login($userData);
                header("Location: " . BASE_URL);

            } else {
                $this->renderLogin("Usuario y/o contraseña inválidos");
            }
        }else{
            $this->renderLogin("Ingrese usuario y contraseña");
        }
    }

    function logout(){ //Función para desloguear desde un botón
        $this->authHelper->logout();
    }

    function checkUserID($user_id, $users = null){ 
        if (!$users) {
            $users = $this->userModel->getAll();
        }
            foreach ($users as $user) {
                if ($user->id == $user_id) {
                    return $user_id;
                }
            }
        return false;
    }
   
    // FUNCIONES ABM USUARIOS

    function createUser(){
        if(!empty($_REQUEST['password-1']) && !empty($_REQUEST['password-2'])
         && !empty($_REQUEST['usuario']) && !empty($_REQUEST['nombre'])
         && isset($_REQUEST['password-1']) && isset($_REQUEST['password-2'])
         && isset($_REQUEST['usuario']) && isset($_REQUEST['nombre']) ){

            if ($_REQUEST['password-1'] != $_REQUEST['password-2']) { //Check que las contraseñas sean iguales
                $this->renderRegister("Las contraseñas no coinciden");
                die;
            }
            $password = password_hash($_REQUEST['password-1'], PASSWORD_DEFAULT);
            $user = $_REQUEST['usuario'];
            $nombre = $_REQUEST['nombre'];
            $id = $this->userModel->insert($password, $user, $nombre); //Registro en la DB

            if ($id) { //Si se devuelve un id, el usuario se registró y es logueado
                $userData = $this->userModel->getUserData($user);
                $this->authHelper->login($userData);
            } else {
                $this->renderRegister("No pudo realizarse el registro");
            }
            header("Location: " . BASE_URL);
        }else{
            $this->renderRegister("Ingresos inválidos");
        }
    }

    function deleteUser($user_id)
    {
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
         
        //Chequeo de borrado para no quedar sin users admins

        if($user_id != $_SESSION['USER_ID'] ){ //Check que no se auto-elimine
            $user_id = $this->checkUserID($user_id); //Chequeo que el usuario esté en la db

            if ($user_id) {
                $this->userModel->delete($user_id);
                header("Location: " . USERS);
            }else{
                $this->errorView->render("Error usuario no encontrado");
            }
        }else{
                $this->errorView->render("Error ingresos inválidos");
        }
    }
    
    function modifyUserRole(){   
        $access_level = "1";
        $this->authHelper->getPermission($access_level);

        if(!empty($_REQUEST['user-id']) && !empty($_REQUEST['rol-id'])
        && isset($_REQUEST['user-id']) && isset($_REQUEST['rol-id'])){
            $user_id = $_REQUEST['user-id'];
            $role_id = $_REQUEST['rol-id'];

            
            if($user_id != $_SESSION['USER_ID'] ){ //Chequea que no se auto-modifique
                $user_id = $this->checkUserID($user_id); //Chequeo que el usuario esté en la db

                if ($user_id) {
                    $this->userModel->setRole($user_id, $role_id);
                    $this->renderUsersAdmin();
                } else {
                    $this->errorView->render("Usuario no existe");
                }
            }else{
                $this->errorView->render("No es posible realizar la modificación");
            }
        }else{
                $this->errorView->render("Error ingresos inválidos");
        }
    }
}
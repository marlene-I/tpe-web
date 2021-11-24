<?php
require_once 'api/apiView.php';

class AuthHelper {
    private $apiView;
    public function __construct(){
        //abre la sessión siempre para usar el helper
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
        $this->apiView = new ApiView;
    }

    function login($user){
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['USER_ROL'] = $user->id_rol;
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    function checkLogin_Role(){ //Chequea que el usuario este logueado y devuelve el rol si lo está
        if (empty($_SESSION['USER_ID'])) { 
            return false;
        }else{
            return $_SESSION['USER_ROL'];
        }
    }
    
    function checkActivity(){ 
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 18000)) { /* Desloguea en 2 minutos */
                $this->logout();
        } else{
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }
    
    //Combina el chequeo de actividad con el login y el nivel de acceso
    //Recibe por parámetro el nivel de permiso solicitado (ROL)
    //Compara con los datos almacenados en la sesion (comprueba que haya datos)
    function getPermission($permission_required, $api=null){ 
        $this->checkActivity();
        $session_role = $this->checkLogin_Role();

        switch ($session_role) {
            case $permission_required:

                return;
                break;
            default:
                if($api){ //En caso de la API debe chequear que el valor no sea nulo
                   return false;
                }else{
                    header("Location: ". DENIED_ACCESS);
                }
                break;
    }
}



    function logout(){
        session_destroy();
        header("Location: " . BASE_URL);
    }
    
}

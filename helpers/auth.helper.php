<?php

class AuthHelper {
    public function __construct(){
        //abre la sessión siempre para usar el helper
        if (session_status() != PHP_SESSION_ACTIVE) {
            session_start();
        }
    }

    function login($user){
        $_SESSION['USER_ID'] = $user->id;
        $_SESSION['USER_EMAIL'] = $user->email;
        $_SESSION['USER_ROL'] = $user->id_rol;
        $_SESSION['LAST_ACTIVITY'] = time();
    }

    function checkLogin($api=null){
        if (empty($_SESSION['USER_ID'])) { 
            //PROBLEMA de si esta funcion es llamada por la API no reconoce la redireccion
            //Solución: a- Creo otra función checkLogin b- Agrego un if($api) que llame una vista? 
            //c- Creo otra getPermission que retorne una rta, solo para usarla desde APICONTROLLERS
            /* if($api){
                $this->apiView->response
            } */
            header("Location: " . LOGIN);
        }else{
            return $_SESSION['USER_ROL'];
        }
    }
    
    function checkActivity(){ 
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 120)) { /* Desloguea en 2 minutos */
                $this->logout();
        } else{
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }
    
    //Combina el chequeo de actividad con el login y el nivel de acceso
    //Recibe por parámetro el nivel de permiso solicitado
    //Compara con los datos almacenados en la sesion (comprueba que haya datos)
    function getPermission($permission_required, $api=null){ 
        $this->checkActivity();
        $session_role = $this->checkLogin($api);
        if($session_role == $permission_required){
            return;
        }else{
            header("Location: ". DENIED_ACCESS);
            die;          
        }
    }



    function logout(){
        session_destroy();
        header("Location: " . BASE_URL);
    }
    
}

<?php
require_once('model/Model.php');

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
        $_SESSION['LAST_ACTIVITY'] = time();
    }
    function checkLogin(){
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . LOGIN);
        }
    }

    function checkActivity(){ 
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 120)) { /* Desloguea en 2 minutos */
                $this->logout();
        } else{
            $_SESSION['LAST_ACTIVITY'] = time();
        }
    }

    function logout(){
        session_destroy();
        header("Location: " . BASE_URL);
    }
    
}

<?php

class AuthHelper {
    public function __construct() {}

    function checkLogin()
    {
       /*  session_start(); */
        if (empty($_SESSION['USER_ID'])) {
            header("Location: " . LOGIN);
        }
    }
    function checkActivity()
    { /* echo ("activity checked<br>". time()-$_SESSION['LAST_ACTIVITY']); */
        
        if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10000)) { /* Desloguea en 2 minutos */
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
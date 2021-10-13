<?php
 require_once('libs/Smarty.class.php');
 require_once('helpers/auth.helper.php');
class ViewIngreso{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLoginForm($categorias=null,$error=null){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('templates/formLogin.tpl');  
    }

    function mostrarFormRegistro($categorias=null,$error=null){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/formRegistro.tpl');
    }
}
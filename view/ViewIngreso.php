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
    function accesoDenegado(){
        $this->smarty->display('templates/accesoDenegado.tpl');
    }

    function showUserAdmin($users, $categorias=null, $error=null, $numAdmins=NULL){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('error', $error);
        $this->smarty->assign('users',$users);
        $this->smarty->assign('numAdmins', $numAdmins); //**CHECK */
        $this->smarty->display('templates/userAdmin.tpl');
    }
}
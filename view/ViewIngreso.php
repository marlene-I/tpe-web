<?php
 require_once('libs/Smarty.class.php');
 require_once('helpers/auth.helper.php');
class AccessView{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }

    function showLoginForm($categorias=null,$error=null){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->display('templates/form/formLogin.tpl');  
    }

    function renderRegisterForm($categorias=null,$error=null){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/form/formRegister.tpl');
    }
    function renderError($error=null){
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/renderError.tpl');
    }

    function showUserAdmin($users, $categorias=null){
        $this->smarty->assign('categorias', $categorias);
        $this->smarty->assign('users',$users);
        $this->smarty->display('templates/section/sectionUsersAdmin.tpl');
    }
}
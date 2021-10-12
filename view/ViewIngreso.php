<?php
 require_once('libs/Smarty.class.php');
 class ViewIngreso{
    private $smarty;
    function __construct(){
        $this->smarty = new Smarty();
    }
    
    
    function showLoginForm($error=null){
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/formLogin.tpl');  
    }


}
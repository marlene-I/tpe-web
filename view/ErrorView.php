<?php

class ErrorView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

     
    function render($error=null){
        $this->smarty->assign('error', $error);
        $this->smarty->display('templates/renderError.tpl');
    }
}
?>
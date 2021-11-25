<?php

class ErrorView{
    private $smarty;

    function __construct(){
        $this->smarty = new Smarty();
    }

     
    function render($error=null,$category=null, $empty=null){
        $this->smarty->assign('error', $error);
        $this->smarty->assign('categorias', $category);
        $this->smarty->assign('empty', $empty);
        $this->smarty->display('templates/renderError.tpl');
    }
}
?>
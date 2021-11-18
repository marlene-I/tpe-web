<?php
require_once 'api/apiView.php';

class renderError{
    private $apiView;

    function __construct(){
        $this->apiView = new ApiView;
    }

    function responseError($errorMsg, $code){ //Qué es mejor tener esta función en este helper o llamar directo a la apiview (prolijidad)
        $this->apiView->response($errorMsg, $code);
    }
}
?>
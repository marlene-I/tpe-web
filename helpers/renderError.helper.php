<?php
require_once 'api/apiView.php';

class RenderErrorHelper{
    private $apiView;
    private $accessView;

    function __construct(){
        $this->apiView = new ApiView;
        $this->accessView = new AccessView;
    }

     
    function renderError($error = null){
        $this->accessView->renderError($error);
               
    }
}
?>
<?php
require_once 'model/ModelComment.php';
require_once 'apiView.php';


class apiCommentController{
    private $model;
    private $view;

    public function __construct(){
        $this->model = new CommentModel();
        $this->view = new apiView();
    }
    public function getAll($id_producto){ //PENSAR LA FORMA DE PASAR POR PARAMETRO EL ID DE PRODUCTO 
        //SEGURAMENTE SEA NECESARIO REESCRIBIR EL ENDPOINT === comentario/id_producto. es correcto?
        $ID_producto = $id_producto[":ID"];
        $comments = $this->model->getAll($ID_producto);
        if($comments)
            $this->view->response($comments, 200);
        else
            $this->view->response("Error",404);
    }

    public function insertComment( ){
        $input = $this->getBody();

    /* $this->view->response($input, 200); */
        $id_producto = $input->id_producto;
        $id_usuario = $input->id_usuario;
        $comentario = $input->comentario;
        $puntuacion = $input->puntuacion;

        $idComment = $this->model->insert($id_producto, $comentario, $id_usuario, $puntuacion);

        $nComment = $this->model->getComment($idComment);

        if($nComment)
            $this->view->response($nComment, 200);
        else
            $this->view->response("Comentario no encontrado", 500);
             
    }

    private function getBody(){
        $input = file_get_contents("php://input");
        return json_decode($input);
    }
}
?>
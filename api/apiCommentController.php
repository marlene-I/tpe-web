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

    public function getAll($params = null ){  //Obtiene todos los comentarios y los retorna como JSON
        $id_producto = $params[":ID"]; //**CHAN**
        $comments = $this->model->getAll($id_producto);
        if($comments)
            $this->view->response($comments, 200);
        else
            $this->view->response("No encontrado",404);
    }

    public function insertComment( ){ //Inserta un comentario, checkea el insert y lo devuelve como JSON
        $input = $this->getBody();

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

    public function eraseComment($params = null){ //Elimina el comentario y devuelve el id del comentario eliminado 
        // $id_prod = $params[":ID_PROD"]; CREO QUE NO NECESITO ESTE PARAMETRO
        $id_comment = $params[":ID_COMMENT"];
        
        $comment = $this->model->eraseOne($id_comment);
        
    }

    private function getBody(){
        $input = file_get_contents("php://input");
        return json_decode($input);
    }
}
?>
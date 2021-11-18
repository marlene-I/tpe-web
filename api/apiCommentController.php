<?php
require_once 'model/CommentModel.php';
require_once 'apiView.php';
require_once 'helpers/auth.helper.php';

class apiCommentController{
    private $model;
    private $apiView;
    private $authHelper;

    public function __construct(){
        $this->model = new CommentModel();
        $this->apiView = new apiView();
        $this->authHelper= new AuthHelper();
    }

    public function getAll($params = null ){  //Obtiene todos los comentarios y los retorna como JSON
        $id_producto = $params[":ID"]; //**CHAN**
        $comments = $this->model->getAll($id_producto);
        if($comments)
            $this->apiView->response($comments, 200);
        else
            $this->apiView->response("No encontrado",404);
    }

    public function insertComment( ){ //Inserta un comentario, checkea el insert y lo devuelve como JSON
        $access_level = "2";
        $this->authHelper->getPermission($access_level);

        $input = $this->getBody();

        $id_producto = $input->id_producto;
        $id_usuario = $input->id_usuario;
        $comentario = $input->comentario;
        $puntuacion = $input->puntuacion;

        $idComment = $this->model->insert($id_producto, $comentario, $id_usuario, $puntuacion);

        $nComment = $this->model->getComment($idComment);

        if($nComment)
            $this->apiView->response($nComment, 200);
        else
            $this->apiView->response("Comentario no encontrado", 500);
    }

    public function eraseComment($params = null){ //Elimina el comentario y devuelve el id del comentario eliminado 
        $access_level = "1";
        $this->authHelper->getPermission($access_level);
        $id_comment = $params[":ID_COMMENT"];
        
        $comment = $this->model->delete($id_comment);
        
    }

    private function getBody(){ //Obtiene el cuerpo de un POST request
        $input = file_get_contents("php://input");
        return json_decode($input);
    }
}
?>
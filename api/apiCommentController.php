<?php
require_once 'model/CommentModel.php';
require_once 'apiView.php';
require_once 'helpers/auth.helper.php';

class apiCommentController{
    private $commentModel;
    private $apiView;
    private $authHelper;
    

    public function __construct(){
        $this->commentModel = new CommentModel();
        $this->apiView = new apiView();
        $this->authHelper= new AuthHelper();
        
    }

    public function getAll($params = null ){  //Obtiene todos los comentarios y los retorna como JSON
        $id_product = $params[":ID"]; 
        if(isset($_GET['order']) && isset($_GET['sort']) && 
        !empty($_GET['order']) && !empty($_GET['sort'])){
            $order = $_GET['order'];
            $sortBy = $_GET['sort']; 
            $comments = $this->getCommentsOrdered($id_product,$order,$sortBy);

        } elseif(isset($_GET['score']) && !empty($_GET['score']) ){
            $scoreFilter = $_GET['score'];
            $comments = $this->commentModel->getSorted($id_product,'id', 'ASC', $scoreFilter);

        }else{
            $comments = $this->commentModel->getAll($id_product);

        }
        
        if($comments)
            $this->apiView->response($comments, 200);
        else
            $this->apiView->response("No encontrado",404);
    }

    public function insertComment( ){ //Inserta un comentario, checkea el insert y lo devuelve como JSON
        $access_level = "2";
        $this->authHelper->getPermission($access_level, true);

        $input = $this->getBody();

        $id_producto = $input->id_producto;
        $id_usuario = $input->id_usuario;
        $comentario = $input->comentario;
        $puntuacion = $input->puntuacion;

        $idComment = $this->commentModel->insert($id_producto, $comentario, $id_usuario, $puntuacion);

        $nComment = $this->commentModel->getComment($idComment);

        if($nComment)
            $this->apiView->response($nComment, 200);
        else
            $this->apiView->response("Comentario no encontrado", 500);
    }

    public function eraseComment($params = null){ //Elimina el comentario y devuelve el id del comentario eliminado 
        $access_level = "1";
        $this->authHelper->getPermission($access_level,true);
        $id_comment = $params[":ID_COMMENT"];
        
        $comment = $this->commentModel->delete($id_comment);
        
    }

    public function getCommentsOrdered($id_product, $order,$sortBy,$score=null ){ // Obtiene los comentarios clasificados por antiguedad o puntaje
        //en orden ascendente o descendente
         
        if( isset($_GET['score']) && !empty($_GET['score'] )){
            
            $scoreFilter = $_GET['score'];
            $comments = $this->commentModel->getSorted($id_product, $sortBy, $order, $scoreFilter);
            return $comments;

        }else{

            $comments = $this->commentModel->getSorted($id_product, $sortBy, $order);
            return $comments;
        }
        
    }

    private function getBody(){ //Obtiene el cuerpo de un POST request
        $input = file_get_contents("php://input");
        return json_decode($input);
    }

    
}
?>
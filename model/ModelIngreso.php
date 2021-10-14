<?php
class ModelIngreso{
    private $db;
    public function __construct(){ 
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
    }

    function getUserData($userEmail){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$userEmail]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    
    function crearUsuario($password,$usuario){
        $query = $this->db->prepare('INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES (NULL, ?, ?);');
        $query->execute([$usuario,$password]);
   }
}

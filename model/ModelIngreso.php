<?php
class ModelIngreso{
    function getUserData($userEmail){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
        $query = $db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$userEmail]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    function crearUsuario($password,$usuario){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
        $query = $db->prepare('INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES (NULL, ?, ?);');
        $query->execute([$usuario,$password]);
   }
}

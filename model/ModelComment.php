<?php
    class CommentModel
    {
        private $db;
        function __construct()
        {
            $this->db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
        }
        function getAll($id_producto){
            $query = $this->db->prepare('SELECT U.nombre, C.id, C.comentario, C.puntuacion
            FROM usuarios AS U
            RIGHT JOIN comentarios AS C
            ON U.id = C.id_usuario
            LEFT JOIN producto AS P 
            ON C.id_producto = P.id_productos WHERE C.id_producto = ?');
            $query->execute([$id_producto]);
            $comentarios = $query->fetchAll(PDO::FETCH_OBJ);
            return $comentarios;
        }
        function eraseOne($id_comment){
            $query = $this->db->prepare('DELETE FROM comentarios WHERE id=?');
            $query->execute([$id_comment]);
        }
        function insert($id_prod, $comment, $id_usuario, $puntuacion){
            $query = $this->db->prepare('INSERT INTO `comentarios` 
            (`ID`, `id_producto`, `id_usuario`, `comentario`, `puntuacion`)
             VALUES (NULL, ?, ?, ?, ?)');
            $query->execute([$id_prod, $id_usuario, $comment, $puntuacion]);            
            return $this->db->lastInsertId();
        }

        public function getComment($id_comment){
            $query = $this->db->prepare('SELECT * FROM comentarios WHERE ID = ?');
            $query->execute([$id_comment]);
            $comment = $query->fetch(PDO::FETCH_OBJ);
            return $comment;
        }
    }

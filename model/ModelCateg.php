<?php
class ModelCateg{
    private $db;
    public function __construct(){ 
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
    }

    function filtrarCategorias($dato){ //$dato variable no descriptiva
        $query =  $this->db->prepare(
        'SELECT `producto`.*,`categoria`.* FROM `producto` 
        INNER JOIN `categoria` ON `categoria`.`id_categoria`= `producto`.`id_categorias_fk`
        WHERE nombre_categoria = ?');
        $query->execute([$dato]);
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }

    function obtenerCategorias(){  
        $query =  $this->db->prepare('SELECT nombre_categoria AS nombre, id_categoria AS id FROM categoria');
        $query->execute();
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }

    function agregarCategoria($categoria){
        $query =  $this->db->prepare('INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES (NULL, ?)');
        $query->execute([$categoria]);
    }

    function borrarCategoria($categoria){
        $query =  $this->db->prepare('DELETE FROM `categoria` WHERE `categoria`.`id_categoria` = ?');
        $query->execute([$categoria]);
    }

    function modificarCategoria($newCategoria,$id){
        $query =  $this->db->prepare("UPDATE `categoria` SET `nombre_categoria` = ? WHERE `categoria`.`id_categoria` = ?");
        $query->execute([$newCategoria,$id]);

    }
}
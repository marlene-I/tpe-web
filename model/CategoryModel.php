<?php
class CategoryModel{
    private $db;
    public function __construct(){ 
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
    }
    
    function getAll(){  
        $query =  $this->db->prepare('SELECT nombre_categoria AS nombre, id_categoria AS id FROM categoria');
        $query->execute();
        $category = $query->fetchAll(PDO::FETCH_OBJ);
        return $category;
    }

    function insert($category){
        $query =  $this->db->prepare('INSERT INTO `categoria` (`id_categoria`, `nombre_categoria`) VALUES (NULL, ?)');
        $query->execute([$category]);
    }

    function delete($category){
        $query =  $this->db->prepare('DELETE FROM `categoria` WHERE `category`.`id_categoria` = ?');
        $query->execute([$category]);
    }

    function modify($newCategory,$id){
        $query =  $this->db->prepare("UPDATE `categoria` SET `nombre_categoria` = ? WHERE `category`.`id_categoria` = ?");
        $query->execute([$newCategory,$id]);

    }
}
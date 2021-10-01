<?php
class Model{
    public function obtenerDatos(){
        
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
        $query = $db->prepare('SELECT a.nombre_producto, a.precio_producto, a.id_productos, a.id_categorias_fk, b.nombre_categoria, b.id_categoria FROM producto a INNER JOIN categoria b ON a.id_categorias_fk = b.id_categoria');
        $query->execute(); 
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
}
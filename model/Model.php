<?php
class Model{
    private $db;
    public function __construct(){ 
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
    }

    public function obtenerTodosLosDatos(){
        $query = $this->db->prepare('SELECT a.nombre_producto, a.precio_producto, a.id_productos, a.id_categorias_fk, b.nombre_categoria, b.id_categoria FROM producto a INNER JOIN categoria b ON a.id_categorias_fk = b.id_categoria');
        $query->execute(); 
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    function agregar($producto,$precio, $detalle, $categoria){ 
        $query = $this->db->prepare('INSERT INTO producto(nombre_producto,precio_producto, detalle, id_categorias_fk) VALUES (?,?,?,?)');
        $query->execute([$producto,$precio,$detalle, $categoria]);
    }

    function borrar($id) {
        $query = $this->db->prepare('DELETE FROM producto WHERE id_productos=?');
        return $query->execute([$id]);
    }

    function modificar($producto, $precio, $detalle,$id,$categoria) {
        $query =  $this->db->prepare('UPDATE `producto` SET `nombre_producto` = ?, `detalle` = ?, `precio_producto` = ?, `id_categorias_fk` = ? WHERE `producto`.`id_productos` = ?;'); 
        return $query->execute([$producto, $detalle, $precio,$categoria,$id]);
    }

    function obtenerInfoProducto($id){
        $query =  $this->db->prepare('SELECT p.nombre_producto AS nombre ,p.precio_producto AS precio ,p.detalle AS detalle, categoria.nombre_categoria FROM producto p INNER JOIN categoria ON categoria.id_categoria = p.id_categorias_fk WHERE id_productos= ?');
        $query->execute([$id]);
        $detalle = $query ->fetchAll(PDO::FETCH_OBJ);
        return $detalle;
    }
}
<?php
class ProductModel{
    private $db;
    public function __construct(){ 
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
    }

    public function getAll(){
        $query = $this->db->prepare('SELECT a.nombre_producto, a.precio_producto, a.id_productos,
         a.id_categorias_fk, b.nombre_categoria, b.id_categoria 
        FROM producto a 
        INNER JOIN categoria b 
        ON a.id_categorias_fk = b.id_categoria');
        $query->execute(); 
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    function insert($product,$price, $detail, $category){ 
        $query = $this->db->prepare('INSERT INTO producto(nombre_producto,precio_producto, detalle, id_categorias_fk) VALUES (?,?,?,?)');
        $query->execute([$product,$price, $detail, $category]);
    }

    function delete($id) {
        $query = $this->db->prepare('DELETE FROM producto WHERE id_productos=?');
        return $query->execute([$id]);
    }

    function modify($product,$price, $detail, $id, $category) {
        $query =  $this->db->prepare('UPDATE `producto` 
        SET `nombre_producto` = ?, 
        `detalle` = ?,
        `precio_producto` = ?,
        `id_categorias_fk` = ? 
        WHERE `producto`.`id_productos` = ?;'); 
        return $query->execute([$product,$detail, $price, $category, $id]);
    }

    function getProduct($id){
        $query =  $this->db->prepare(
            'SELECT p.nombre_producto AS nombre,
            p.precio_producto AS precio,
            p.detalle AS detalle, 
            categoria.nombre_categoria
            FROM producto p 
            INNER JOIN categoria 
            ON categoria.id_categoria = p.id_categorias_fk 
            WHERE id_productos= ?');
        $query->execute([$id]);
        $detalle = $query ->fetchAll(PDO::FETCH_OBJ);
        return $detalle;
    }

    function filterByCateg($category){
        $query =  $this->db->prepare(
        'SELECT `producto`.*,`categoria`.* FROM `producto` 
        INNER JOIN `categoria` ON `categoria`.`id_categoria`= `producto`.`id_categorias_fk`
        WHERE nombre_categoria = ?');
        $query->execute([$category]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    function advancedSearch($lowLim=NULL, $uppLim=null, $prodName='%',$categName='%'){
        $query = $this->db->prepare('SELECT p.nombre_producto, p.precio_producto, p.id_productos,
        p.id_categorias_fk, c.nombre_categoria, c.id_categoria 
       FROM producto AS p 
       INNER JOIN categoria AS c 
       ON p.id_categorias_fk = c.id_categoria
       WHERE p.precio_producto BETWEEN IFNULL(? ,0) AND IFNULL(?,99999) AND
       p.nombre_producto LIKE ? AND
       c.nombre_categoria LIKE ?');

       $query->execute([$lowLim, $uppLim, $prodName, $categName]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }
}
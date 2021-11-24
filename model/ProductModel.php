<?php
class ProductModel{
    private $db;
    public function __construct(){ 
        $this->db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
    }

    public function getAll(){
        $query = $this->db->prepare('SELECT p.nombre_producto, p.precio_producto, p.id_productos,
         p.id_categorias_fk, p.imagen,c.nombre_categoria, c.id_categoria 
        FROM producto p 
        INNER JOIN categoria c 
        ON p.id_categorias_fk = c.id_categoria');
        $query->execute(); 
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    function insert($product,$price, $detail, $category,$pathImg = null){
        
        $query = $this->db->prepare('INSERT INTO producto(nombre_producto,precio_producto, detalle, id_categorias_fk,imagen) 
        VALUES (?,?,?,?,?)');
        $query->execute([$product,$price, $detail, $category,$pathImg]);
        
    }
    

    function delete($id) {
        $query = $this->db->prepare('DELETE FROM producto WHERE id_productos=?');
        return $query->execute([$id]);
    }

    function modify($product,$price, $detail, $id, $category, $pathImg=null) {
        $query =  $this->db->prepare('UPDATE `producto` 
        SET `nombre_producto` = ?, 
        `detalle` = ?,
        `precio_producto` = ?,
        `id_categorias_fk` = ?,
        `imagen` = ?
        WHERE `producto`.`id_productos` = ?;'); 
        return $query->execute([$product,$detail, $price, $category, $pathImg,$id]);
    }

    function uploadImage($image){
        $target = 'img/' . uniqid() . '.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    function deleteImage($pathImg){ //Elimina la imagen del servidor (../img/..) retorna el resultado (T/F)
        $unlinked = unlink($pathImg);
        return $unlinked;
    }

    function unbindImage($id_product){ //Elimina el path de la imagen asociada al producto en la DB
        $query = $this->db->prepare('UPDATE producto 
            SET imagen = NULL
            WHERE producto.id_productos = ?');
        return $query ->execute([$id_product]);
    }

    function getProduct($id){
        $query =  $this->db->prepare(
            'SELECT p.nombre_producto AS nombre,
            p.precio_producto AS precio,
            p.detalle AS detalle, 
            p.imagen AS imagen,
            categoria.nombre_categoria
            FROM producto p 
            INNER JOIN categoria 
            ON categoria.id_categoria = p.id_categorias_fk 
            WHERE id_productos= ?');
        $query->execute([$id]);
        $detalle = $query ->fetch(PDO::FETCH_OBJ);
        return $detalle;
    }

//Filtra productos por categoría. Recibe por parámetro el nombre de categoria 
    function filterByCateg($category){
        $query =  $this->db->prepare(
        'SELECT `producto`.*,`categoria`.* FROM `producto` 
        INNER JOIN `categoria` ON `categoria`.`id_categoria`= `producto`.`id_categorias_fk`
        WHERE nombre_categoria = ?');
        $query->execute([$category]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

    //Realiza búsqueda de productos en base a nombre,categoria, o precios (max o min)
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
    function countProducts(){
        $query  = $this->db->prepare('SELECT COUNT(id_productos) AS prod_num
        FROM producto');
        $query->execute();
        $count = $query->fetch(PDO::FETCH_OBJ);
        return $count;
    }

    function getPage($numInPage, $offset=0){
        $query = $this->db->prepare('SELECT p.nombre_producto, p.precio_producto, p.id_productos,
        p.id_categorias_fk, c.nombre_categoria, c.id_categoria 
        FROM producto p 
        INNER JOIN categoria c 
        ON p.id_categorias_fk = c.id_categoria
        ORDER BY p.nombre_producto
        LIMIT '.$numInPage.' OFFSET ' .$offset); //Ambos valores son chequeados en el controller
        $query->execute([]);
        $products = $query->fetchAll(PDO::FETCH_OBJ);
        return $products;
    }

}
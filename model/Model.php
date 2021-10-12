<?php
class Model{
    public function obtenerTodosLosDatos(){
        
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
        $query = $db->prepare('SELECT a.nombre_producto, a.precio_producto, a.id_productos, a.id_categorias_fk, b.nombre_categoria, b.id_categoria FROM producto a INNER JOIN categoria b ON a.id_categorias_fk = b.id_categoria');
        $query->execute(); 
        $productos = $query->fetchAll(PDO::FETCH_OBJ);
        return $productos;
    }
    function filtrarCategorias($dato){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
       // $query = $db->prepare('SELECT * FROM categoria WHERE nombre_categoria = ?');
       $query = $db->prepare(
        'SELECT `producto`.*,`categoria`.* FROM `producto` 
        INNER JOIN `categoria` ON `categoria`.`id_categoria`= `producto`.`id_categorias_fk`
        WHERE nombre_categoria = ?');
       // $query = $db->prepare('SELECT * FROM `materia` WHERE * LIKE ?');
        $query->execute([$dato]);
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }
    function obtenerSoloCategorias(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
        $query = $db->prepare('SELECT nombre_categoria AS nombre, id_categoria AS id FROM categoria');
        $query->execute();
        $categoria = $query->fetchAll(PDO::FETCH_OBJ);
        return $categoria;
    }
    function obtenerInfoProducto($id){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8','root','');
        $query = $db->prepare('SELECT p.nombre_producto AS nombre ,p.precio_producto AS precio ,p.detalle AS detalle, categoria.nombre_categoria FROM producto p INNER JOIN categoria ON categoria.id_categoria = p.id_categorias_fk WHERE id_productos= ?');
        $query->execute([$id]);
        $detalle = $query ->fetchAll(PDO::FETCH_OBJ);
        return $detalle;
    }
    function agregar($producto,$precio, $detalle, $categoria){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');

        $query = $db->prepare('INSERT INTO producto(nombre_producto,precio_producto, detalle, id_categorias_fk) VALUES (?,?,?,?)');
        $query->execute([$producto,$precio,$detalle, $categoria]);
        return $db->lastInsertId();
    }
    /*   function obtenerCategorias(){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
       $query = $db->prepare('SELECT categoria.* FROM categoria');
       $query->execute();
       $categoria = $query->fetchAll(PDO::FETCH_OBJ);

       return $categoria;
    }*/
    function borrar($id) {
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
    
        $query = $db->prepare('DELETE FROM producto WHERE id_productos=?');
        return $query->execute([$id]);
    }

    function modificar($producto, $precio, $detalle,$id,$categoria) {
        
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
        //para modificar la tabla fuerte uso el comentado
       // $query = $db->prepare('UPDATE `materia` INNER JOIN `detalle` ON `materia`.`id_materias` = `detalle{`.`id` SET `nombre` = ?, `precio` = ? `id_materias`= ? WHERE `materia`.`id` = ? ');
       /* $query = $db->prepare('UPDATE `producto` SET `nombre_producto` = ?, `precio_producto` = ?,`detalle` = ?, `id_producto` = ?, `id_categorias_fk` WHERE `producto`.`id_producto` = ?;'); */
       $query = $db->prepare('UPDATE `producto` SET `nombre_producto` = ?, `detalle` = ?, `precio_producto` = ?, `id_categorias_fk` = ? WHERE `producto`.`id_productos` = ?;'); 
        return $query->execute([$producto, $detalle, $precio,$categoria,$id]);
    }
    function getUserData($userEmail){
        $db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
        $query = $db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$userEmail]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }

}
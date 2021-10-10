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

    function modificar($nombre, $profesor, $carrera,$id) {
        
        $db = new PDO('mysql:host=localhost;'.'dbname=db_materias;charset=utf8', 'root', '');
        //para modificar la tabla fuerte uso el comentado
       // $query = $db->prepare('UPDATE `materia` INNER JOIN `carrera` ON `materia`.`id_materias` = `carrera`.`id` SET `nombre` = ?, `profesor` = ? `id_materias`= ? WHERE `materia`.`id` = ? ');
       $query = $db->prepare('UPDATE `producto` SET `nombre_producto` = ?, `precio_producto` = ?,`detalle` = ?, `id_producto` = ? WHERE `producto`.`id_producto` = ?;');
        return $query->execute([$nombre, $profesor, $carrera,$id]);
    }

}
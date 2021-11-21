<?php
class UserModel{
    private $db;
    public function __construct(){ 
       $this->db = new PDO('mysql:host=localhost;'.'dbname=db_bares;charset=utf8', 'root', '');
    }

    function getUserData($userEmail){
        $query = $this->db->prepare('SELECT * FROM usuarios WHERE email = ?');
        $query->execute([$userEmail]);
        $user = $query->fetch(PDO::FETCH_OBJ);
        return $user;
    }
    
    function insert($password,$user,$name){
        $query = $this->db->prepare('INSERT INTO `usuarios` 
        (`id`, `nombre`, `email`, `password`,`id_rol`)
         VALUES (NULL, ?, ?, ?, ?);');
        $query->execute([$name,$user,$password,2]);
        return $this->db->lastInsertId();
   }

   function getAll(){
       $query = $this->db->prepare(
            'SELECT u.id, u.nombre, u.email, u.id_rol, r.rol 
            FROM usuarios AS u 
            LEFT JOIN roles AS r 
            ON u.id_rol = r.id ');
        $query->execute([]);
        return $query->fetchAll(PDO::FETCH_OBJ);
   }

   function setRole($user_id, $newRole){
        $query = $this->db->prepare('UPDATE `usuarios` 
        SET `id_rol` = ? 
        WHERE `usuarios`.`id` = ?'); 
        $query->execute([$newRole,$user_id]);
   }

   function delete($user_id){
       $query = $this->db->prepare('DELETE FROM usuarios WHERE usuarios.id = ?');
       $query->execute([$user_id]);
   }
}

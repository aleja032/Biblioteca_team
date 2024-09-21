<?php
class User{
    public $db_connect;

    public function __construct ($db_connect){
        $this -> db_connect = $db_connect;
    }

    public function  createUser($id_user, $name, $email, $password, $role){

        try{
            $query = $this -> db_connect -> prepare("INSERT INTO usuarios (id_usuario, nombre, email, constraseña, id_usuario_rol) VALUES (?,?,?,?,?)");
            $query -> bind_param("isssi", $id_user, $name, $email, $password, $role);
            $query -> execute();
        if($query -> affected_rows>0){
            return true;
        }
            return false;
        }
        catch(Exception $e){
            
            echo "Error" .$e->getMessage();
            return false;
            $query -> close();
        }
    }
}
?>
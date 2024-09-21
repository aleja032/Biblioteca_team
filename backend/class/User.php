<?php
class User{
    public $db_connect;

    public function __construct ($db_connect){
        $this -> db_connect = $db_connect;
    }

    public function  createUser($id_user, $name, $email, $password){

        try{
            $query = $this -> db_connect -> prepare("INSERT INTO members (id, name, email, password) VALUES (?,?,?,?)");
            $query -> bind_param("isss", $id_user, $name, $email, $password);
            $query -> execute();
                if($query -> affected_rows > 0){
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
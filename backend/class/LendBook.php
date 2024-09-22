<?php
class LendBook{
    public $db_connect;

    public function __construct($db_connect){
        $this -> db_connect = $db_connect;
    }

    public function lendBook($id_book, $id_user, $due_date){

        try{
            $query = $this -> db_connect -> prepare("INSERT INTO lendinghistory (book_id, member_id, due_date) values (?,?,?)");
            $query -> bind_param("iis", $id_book, $id_user, $due_date);
            $query -> execute();
                if($query -> affected_rows > 0){
                    return true;
                }
                return false;
        }
        catch(Exception $e){
            echo"Error".$e->getMessage();
            return false;
            $query -> close();
        }
    }

}
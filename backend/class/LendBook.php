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

    public function allLentBooks(){
        
        try{
            $query = $this -> db_connect -> prepare("   SELECT l.id, b.title, m.name, l.lend_date, l.due_date, b.isbn from lendinghistory l 
                                                        INNER JOIN books b ON l.book_id = b.id 
                                                        INNER JOIN members m ON l.member_id = m.id");
            $query -> execute();
            $result = $query -> get_result();
            $lent = $result -> fetch_all(MYSQLI_ASSOC);
            $query ->close();

            if($lent){
                return $lent;
            }
        }
        catch(Exception $e){
            echo"Error".$e->getMessage();
            return false;
            $query -> close();
        }
    }

}
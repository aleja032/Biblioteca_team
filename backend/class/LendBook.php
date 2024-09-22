<?php
class LendBook{
    public $db_connect;

    public function __construct($db_connect){
        $this -> db_connect = $db_connect;
    }

    public function lendBook($id_book, $id_user, $due_date){

        try{
            $this -> db_connect -> begin_transaction(); // Start transaction to ensure both operations succeed

            $query = $this -> db_connect -> prepare("INSERT INTO lendinghistory (book_id, member_id, due_date) values (?,?,?)");
            $query -> bind_param("iis", $id_book, $id_user, $due_date);
            $query -> execute();

            // Step 2: Decrease available copies in books table
            $query2 = $this-> db_connect -> prepare("UPDATE books SET available_copies = available_copies - 1 WHERE id = ? AND available_copies > 0");
            $query2->bind_param("i", $id_book);
            $query2->execute();

            // Check if the available copies were successfully updated
                if($query2 -> affected_rows > 0){
                    $this -> db_connect -> commit();
                    return true;
                }
            // If the update failed, rollback the transaction
                else{
                    $this -> db_connect -> rollback();
                    return false;
                }
        }
        catch(Exception $e){
            // Rollback in case of an error
            $this->db_connect->rollback();
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

    public function updateLendBook($return, $id_lend, $id_book){

        try{

            $this -> db_connect -> begin_transaction();

            $query = $this -> db_connect -> prepare("UPDATE lendinghistory SET return_date = ? WHERE id = ?");
            $query -> bind_param("si", $return, $id_lend);
            $query -> execute();

            $query2 = $this -> db_connect -> prepare("UPDATE books SET available_copies = available_copies + 1 WHERE id = ?");
            $query2 -> bind_param("i", $id_book);
            $query2 -> execute();

                if($query2 -> affected_rows > 0){
                    $this -> db_connect -> commit();
                    return true;
                }
                else{
                    $this -> db_connect -> rollback();
                    return false;
                }
        }
        catch(Exception $e){
            $this -> db_connect -> rollback();
            echo"Error".$e->getMessage();
            return false;
            $query -> close();
        }
    }

}
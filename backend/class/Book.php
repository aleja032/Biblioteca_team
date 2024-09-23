<?php
class Book{
    public $db_connect;

    public function __construct($db_connect){
        $this -> db_connect = $db_connect;
    }

    public function createBook($title, $author, $isbn, $year, $total_copies, $available_copies){

        try{
            $query = $this -> db_connect -> prepare("INSERT INTO books (title, author, isbn, published_year, total_copies, available_copies) VALUES (?,?,?,?,?,?)");
            $query -> bind_param("sssiii", $title, $author, $isbn, $year, $total_copies, $available_copies);
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

    public function allBooks(){
        
        try{
            $query = $this -> db_connect -> prepare("SELECT * from books");
            $query -> execute();
            $result = $query -> get_result();
            $books = $result -> fetch_all(MYSQLI_ASSOC);
            $query ->close();

            if($books){
                return $books;
            }
        }
        catch(Exception $e){
            echo"Error".$e -> getMessage();
            return false;
            $query -> close();
        }
    }

    public function deleteBook($id){
        try{
            $query = $this -> db_connect -> prepare("DELETE FROM books WHERE id = ?");
            $query -> bind_param("i",$id);
            $query -> execute();

            if($query -> affected_rows > 0){
                return true;
            }
            return false;
        }
        catch(Exception $e){
            echo"Error".$e -> getMessage();
            return false;
            $query -> close();
        }
        
    }

    public function searchBookByID($book_id){
        try {
            $query = $this -> db_connect -> prepare("SELECT * FROM books WHERE id = ?");
            $query -> execute();
            $result = $query -> get_result();
            $books = $result -> fetch_assoc();

            if($books){
                return $books;
            }
            
        } catch (Exception $e) {
            echo"Error".$e -> getMessage();
            return false;
            $query -> close();
        }
    }
}
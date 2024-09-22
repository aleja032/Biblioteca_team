<?php
class Book{
    public $db_connect;

    public function __construct($db_connect){
        $this -> db_connect = $db_connect;
    }

    public function createBook($id_book, $title, $author, $isbn, $year, $total_copies, $available_copies){

        try{
            $query = $this -> db_connect -> prepare("INSERT INTO books (id, title, author, isbn, published_year, total_copies, available_copies) VALUES (?,?,?,?,?,?,?)");
            $query -> bind_param("isssiii", $id_book, $title, $author, $isbn, $year, $total_copies, $available_copies);
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
            $query = $this -> db_connect -> prepare("SELECT id, title from books");
            $query -> execute();
            $result = $query -> get_results();
            $books = $result -> fetch_all(MYSQL_ASSOC);
            $query ->close();

            if($books){
                return $books;
            }
        }
        catch(Exception $e){
            echo"Error".$e->getMessage();
            return false;
            $query -> close();
        }
    }
}
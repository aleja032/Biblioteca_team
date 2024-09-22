<?php
    require_once '../../backend/config/db_connect.php';
    include '../../backend/class/Book.php';

    $book = new Book($conn);

    $id_book = $_POST['id'];

    $func = $book -> deleteBook($id_book);

    if($func){
        echo"Book deleted successfully";
    }


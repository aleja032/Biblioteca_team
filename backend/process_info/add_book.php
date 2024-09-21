<?php
    require_once '../../backend/config/db_connect.php';
    include '../../backend/class/Book.php';

    $book = new Book($conn);

    $id = $_POST['id_book'];
    $name = $_POST['name_book'];
    $author = $_POST['author_book'];
    $isbn = $_POST['isbn_book'];
    $year = $_POST['year'];
    $copies = $_POST['total_copies'];

    $func = $book -> createBook($id, $name, $author, $isbn, $year, $copies, $copies);

    if($func){
        echo "book added succesfully";
    }
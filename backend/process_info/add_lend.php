<?php 
    require_once '../../backend/config/db_connect.php';
    include '../../backend/class/LendBook.php';

    $lend_book = new LendBook($conn);

    $user = $_POST['id_user_lend'];
    $book = $_POST['book_id_lend'];
    $date = $_POST['return_date_lend'];

    $func = $lend_book -> lendBook($book, $user, $date);

    if($func){
        echo"Book lent succesfully.";
    }
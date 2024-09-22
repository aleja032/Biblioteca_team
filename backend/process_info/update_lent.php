<?php
    require_once '../../backend/config/db_connect.php';
    include '../../backend/class/LendBook.php';

    $lend = new LendBook($conn);

    $id = $_POST['id'];
    $return_date = $_POST['return_date'];
    $id_book = $_POST[''];

    $func = $lend -> updateLendBook($return_date, $id, $id_book);

    if($func){
        echo"Book given back.";
    }
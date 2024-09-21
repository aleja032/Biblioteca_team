<?php
    require_once '../../backend/config/db_connect.php';
    include '../../backend/class/User.php';

    $user = new User($conn);

    $id = $_POST['id_user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $a = $user -> createUser ($id, $name, $email, $pass, '1');

    if($a){
        echo"user added";
    }
?>
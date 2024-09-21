<?php
    $conn = mysqli_connect('localhost', 'root','', 'biblioteca');

    if(mysqli_error($conn)){
        die("aaaaaaaaa");
    }
    else
    {
        echo "si";
    }
?>
<?php
    $conn = mysqli_connect('localhost', 'root','', 'library');

    if(mysqli_error($conn)){
        die("Database connection failed.");
    }
    else
    {
        echo "Connection successful.";
    }
?>
<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "task_tracker";
    
    // Create a connection
    $conn = mysqli_connect($servername, $username,
                           $password, $database);
    
    // check connection
    if(!$conn) {
        echo ("Error " . mysqli_connect_error());
    }
    
?>
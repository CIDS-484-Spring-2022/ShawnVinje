<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    
    $database = "task_manager";
    
    // Create a connection
    $conn = mysqli_connect($servername, $username,
                           $password, $database);
    
    // check connection
    if($conn) {
        echo "success";
    }
    else {
        echo ("Error " . mysqli_connect_error());
    }

?>
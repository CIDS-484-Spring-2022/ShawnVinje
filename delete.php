<?php

    include("dbconnect.php");
    $id = $_GET['id'];
    $sql = "Delete From tasks Where Task_id = $id ";
    mysqli_query($conn, $sql);
    
?>
    
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Delete Task</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial scale=1">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href=
        "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
        integrity=
        "sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" 
        crossorigin="anonymous">
    </head>
    <body>
        <div class="text-center">
            <h1>Task Deleted!</h1>
            <form action="index.php">
                <button type="submit" class="btn btn-warning">
                    Return To Task List
                </button>
            </form>
        </div>
    </body>
</html>
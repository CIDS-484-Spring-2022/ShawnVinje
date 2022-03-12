<?php

    include("dbconnect.php");
    
    $sql = "Select * From tasks";
    $query = mysqli_query($conn, $sql);
    
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Task List</title>
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
        <div class="container">
            <div class="text-center">
                <h1>Task List</h1>
                <form action="create.php">
                    <button type="submit" class="btn btn-warning">
                        New Task
                    </button>
                </form>
                <br>
            </div>
        
            <div class="row">
                <?php
                    while ($q = mysqli_fetch_array($query))
                    {
                ?>
            
                <div class="col-lg-3">
                    <div class="card">
                        <h3 class="card-title text-center">
                            <?php echo($q['Task_Name']); ?>
                        </h3>
                        <p class="card-text text-center">
                            <?php echo($q['Short_Desc']); ?>
                        </p>
                        <p class="card-text text-center">
                            <?php echo("Due By: " . $q['Due_Date']); ?>
                        </p>
                       
                        <?php
                        if($q['Task_Status'] == 0) {
                            echo '<p class="text-danger text-center">'
                            . 'NOT STARTED</p>';
                        }
                        else if($q['Task_Status'] == 1) {
                            echo '<p class="text-warning text-center">'
                            . 'IN PROGRESS</p>';
                        }
                        else {
                            echo '<p class="text-success text-center">'
                            . 'COMPLETED</p>';
                        }
                        ?>
                    
                        <a href="update.php?id=<?php echo($q['Task_id']); ?>"
                           class="btn btn-success">Update</a>
                        <a href="delete.php?id=<?php echo($q['Task_id']); ?>"
                           class="btn btn-danger">Delete</a>
                       
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </body>
</html>
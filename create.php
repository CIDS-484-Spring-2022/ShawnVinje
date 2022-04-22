<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Create Task</title>
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
                <h1>Create New Task</h1>
                <form action="index.php">
                    <button type="submit" class="btn btn-warning">
                        Return To Task List
                    </button>
                </form>
            </div>
            <form action="create.php" method="post">
                <div class="form-group">
                    <label for="taskname">Task Name</label>
                    <input type="text"
                           class="form-control"
                           id="taskname"
                           name="taskname">
                </div>
                <div class="form-group">
                    <label for="shortdesc">Short Description</label>
                    <input type="text" 
                           class="form-control"
                           id="shortdesc"
                           name="shortdesc">
                </div>
                <div class="form-group">
                    <label for="fulldesc">Full Description</label>
                    <input type="text"
                           class="form-control"
                           id="fulldesc"
                           name="fulldesc">
                </div>
                <div class="form-group">
                    <label for="taskstatus">Task Status</label>
                    <select class="form-control"
                           id="taskstatus"
                           name="taskstatus">
                        <option value="0">
                            NOT STARTED
                        </option>
                        <option value="1">
                            IN PROGRESS
                        </option>
                        <option value="2">
                            COMPLETED
                        </option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="duedate">Due Date</label>
                    <input type="date"
                           class="form-control"
                           id="duedate"
                           name="duedate">
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="button">
                    Create Task
                </button>                        
            </form>
        </div>
        
        <?php
        
            if(isset($_POST["button"])) {
                include("dbconnect.php");
                $task_name=$_POST['taskname'];
                $short_desc=$_POST['shortdesc'];
                $full_desc=$_POST['fulldesc'];
                $task_status=$_POST['taskstatus'];
                $due_date=$_POST['duedate'];
                
                $sql = "Insert into tasks(Task_Name, Short_Desc, 
                        Full_Desc, Task_Status, Due_Date)
                        Values('$task_name', '$short_desc',
                        '$full_desc', '$task_status', '$due_date')";
                
                mysqli_query($conn, $sql);
                
                if(!mysqli_query($conn, $sql)) {
                    echo '<h2 class="text-center"><br>Error: ' . 
                            'mysqli_connect_error()</h2>';
                }
                else {
                     echo '<h2 class="text-center"><br>Task Created!</h2>';
                }
            }
            
        ?>
        
    </body>
</html>
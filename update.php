 <?php
        
        include("dbconnect.php");
        if(isset($_POST["button"])) {
            $task_name = $_POST['taskname'];
            $short_desc = $_POST['shortdesc'];
            $full_desc = $_POST['fulldesc'];
            $task_status = $_POST['taskstatus'];
            $due_date = $_POST['duedate'];
            $id = $_GET['id'];
                
            $sql = "Update tasks set Task_Name='$task_name', 
                    Short_Desc='$short_desc', Full_Desc='$full_desc',
                    Task_Status='$task_status', Due_Date='$due_date'
                    Where Task_id='$id'";
                
            mysqli_query($conn, $sql);
                
            if(!mysqli_query($conn, $sql)) {
                echo '<h2 class="text-center"><br>Error: ' . 
                    'mysqli_connect_error()</h2>';
            }
            else {
                echo '<h2 class="text-center"><br>Task Updated!</h2>';
            }
        }
        else if(isset($_GET['id'])) {
            $sql = "Select * From tasks Where Task_id='" . $_GET['id'] . "'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_array($query);
        }
            
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Update Task</title>
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
                <h1>Update Task</h1>
                <form action="index.php">
                    <button type="submit" class="btn btn-warning">
                        Return To Task List
                    </button>
                </form>
            </div>
            <form action="update.php" method="post">
                <div class="form-group">
                    <label for="taskname">Task Name</label>
                    <input type="text"
                           class="form-control"
                           id="taskname"
                           name="taskname"
                           value="<?php echo $result['Task_Name'];?>">
                </div>
                <div class="form-group">
                    <label for="shortdesc">Short Description</label>
                    <input type="text" 
                           class="form-control"
                           id="shortdesc"
                           name="shortdesc"
                           value="<?php echo $result['Short_Desc'];?>">
                </div>
                <div class="form-group">
                    <label for="fulldesc">Full Description</label>
                    <input type="text"
                           class="form-control"
                           id="fulldesc"
                           name="fulldesc"
                           value="<?php echo $result['Full_Desc'];?>">
                </div>
                <div class="form-group">
                    <label for="taskstatus">Task Status</label>
                    <select class="form-control"
                           id="taskstatus"
                           name="taskstatus">
                        <?php
                            if($result['Task_Status'] == 0) {
                        ?>
                        <option value="0" selected>
                            NOT STARTED
                        </option>
                        <option value="1">
                            IN PROGRESS
                        </option>
                        <option value="2">
                            COMPLETED
                        </option>
                        <?php }
                            else if($result['Task_Status'] == 1) {
                        ?>
                        <option value="0">
                            NOT STARTED
                        </option>
                        <option value="1" selected>
                            IN PROGRESS
                        </option>
                        <option value="2">
                            COMPLETED
                        </option>
                        <?php }
                            else if($result['Task_Status'] == 2) {
                        ?>
                        <option value="0">
                            NOT STARTED
                        </option>
                        <option value="1">
                            IN PROGRESS
                        </option>
                        <option value="2" selected>
                            COMPLETED
                        </option>
                        <?php
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="duedate">Due Date</label>
                    <input type="date"
                           class="form-control"
                           id="duedate"
                           name="duedate"
                           value="<?php echo $result['Due_Date']?>">
                </div>
                <br>
                <button type="submit" class="btn btn-success" name="button">
                    Update Task
                </button>                        
            </form>
        </div>
    </body>
</html>
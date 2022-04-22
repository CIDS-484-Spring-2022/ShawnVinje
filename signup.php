<?php

    $success = false;
    $error = false;
    $exists = false;
    
    if(isset($_POST["loginbutton"])) {
        header("location:login.php");
    }

    if(isset($_POST["button"])) {
    
        include("dbconnect.php");
    
        $username = $_POST["username"];
        $password = $_POST["password"];
        $cpassword = $_POST["cpassword"];
    
        $sql = "Select * From users Where Username='$username'";
    
        $result = mysqli_query($conn, $sql);
    
        $num = mysqli_num_rows($result);
    
        // check if username exists
        if($num == 0) {
            if(($password == $cpassword) && ($exists == false)) {
            
                $sql = "Insert into 'users' ('Username', 'Password', 'Date')
                        Values ('$username', '$password', current_timestamp())";
            
                $result = mysqli_query($conn, $sql);
            
                if ($result) {
                    $success = true;
                }
            }
            else {
                $error = true;
            }
        }
    
        if($num > 0) {
            $exists = true;
        }

    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Task Tracker</title>
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
        
    <?php
    
        if($success) {
            echo '<h2 class="text-center">Success!</h2>';
            echo '<h3 class="text-center">Your account is now created
                                          and you can login</h3>';
        }
        
        if($error) {
            echo '<h2 class="text-center">Error!</h2>';
            echo '<h3 class="text-center">Passwords do not match</h3>';
        }
        
        if($exists) {
            echo '<h2 class="text-center">Error!</h2>';
            echo '<h3 class="text-center">That username already exists</h3>';
        }

    ?>
        
        <div class="container">
            <h1 class="text-center">Welcome To Task Tracker</h1>
            <form action="signup.php" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text"
                           class="form-control" 
                           id="username"
                           name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="text"
                           class="form-control"  
                           id="password" 
                           name="password">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label>
                    <input type="text"
                           class="form-control"  
                           id="cpassword" 
                           name="cpassword">
                    <br>
                </div> 
                <button type="submit" class="btn btn-success" name="button">
                    Create Account
                </button>
                <button type="submit" class="btn btn-warning" name="loginbutton">
                    Already have an account?
                </button>
            </form>
        </div>
    </body>
</html>
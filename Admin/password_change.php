
<?php
session_start();
$page_title = "Password Reset Form";
include('database/connection.php');
$email="";
$new_password="";
$confirm_password="";
$token="";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="card" style="margin: 50px 50px;">
            <div class="card-header">
                <center>
                Reset Your PAssword
                </center>
            </div>
            <div class="card-body">
                <form method="POST">
                    <div class="form-group">
                    <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                        <label for="exampleInputEmail1">Your Email</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp"
                             name="email" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>">
                    </div>
                    <div class="form-group">
                        <label>New Password</label>
                        <input type="password" class="form-control" id="new_pass" name="new_pass">
                    </div>
                    <div class="form-group">
                        <label>Confirm Password</label>
                        <input type="password" class="form-control" id="com_pass" name="com_pass">
                    </div>
                    <center>
                    <button type="submit" class="btn btn-success" name="password_update" style="color: black; font-weight: bold;">Update Password</button>
                    </center>
                   
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>


<?php
    if(isset($_POST['password_update'])){

        $email = mysqli_real_escape_string($link,$_POST['email']);
        $new_password = mysqli_real_escape_string($link,$_POST['new_pass']);
        $confirm_password = mysqli_real_escape_string($link,$_POST['com_pass']);

        $token = mysqli_real_escape_string($link,$_POST['password_token']);

        if(!empty($token))
        {
            if(!empty($email) && !empty($new_password) && !empty($confirm_password))
            {
                $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
                $check_token_run = mysqli_query($link,$check_token);
                
                if(mysqli_num_rows($check_token_run)>0)
                {
                    if($new_password == $confirm_password)
                    {
                        $password = $_POST['new_pass'];
                        $password1 =md5($password);
                        $update_password = "UPDATE user SET password='$password1' WHERE verify_token='$token' LIMIT 1";
                        $update_password_run = mysqli_query($link,$update_password);

                        if($update_password_run)
                        {
                            $new_token = md5(rand());
                            $update_new_token = "UPDATE user SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                            $update_new_token_run = mysqli_query($link,$update_new_token);

                            echo"<center>
                            <div class='alert alert-success' style='width: 50%;'>
                            <a href='../Admin/index.php'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
                            <b>Password update successfully.</b>
                            </div></center>
                        ";exit();
                        }
                        else
                        {
                            echo"<center>
                            <div class='alert alert-danger' style='width: 50%;'>
                            <a href='password_change.php?token=$token&email=$email'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
                            <b>Did not updated. Something went wrong!</b>
                            </div></center>
                        ";exit();
                        }
                    }
                    else
                    {
                        echo"<center>
                        <div class='alert alert-danger' style='width: 50%;'>
                        <a href='password_change.php?token=$token&email=$email'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
                        <b>Password and Confirm password not match.</b>
                        </div></center>
                    ";exit();
                    }
                }
                else
                {
                    echo"<center>
                    <div class='alert alert-danger' style='width: 50%;'>
                    <a href='password_change.php?token=$token&email=$email'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
                    <b>Invalid Token.</b>
                    </div></center>
                ";exit();
                }
            }
            else
            {
                echo"<center>
                <div class='alert alert-danger' style='width: 50%;'>
                <a href='password_change.php?token=$token&email=$email'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
                <b>All Field are Mandetory.</b>
                </div></center>
            ";exit();
            }
        }
        else
        {
            echo"<center>
            <div class='alert alert-danger' style='width: 50%;'>
            <a href='password_change.php'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
            <b>No Token Available.</b>
            </div></center>
        ";exit();
        }

    }

?>



</body>
</html>
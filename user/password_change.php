<?php
session_start();
$page_title = "Password Reset Form";
include('db.php');
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

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />
</head>

<body class="bo" style=" background-image: url('image/b1.jpg')">
    <br><br><br><br>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row"> 
                    <div class="col-md-12" id=""></div>
                </div>
                <div class="panel" style="background-color: rgb(12, 129, 129)">
                    <div class="panel-heading" style="font-size: 20px; background-color: rgb(5, 20, 87); color: white;" >
                        <center>
                            Change Password
                    </div>
                    </center>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="row">
                                <input type="hidden" name="password_token" value="<?php if(isset($_GET['token'])){echo $_GET['token'];} ?>">
                                <div class="col-md-4" style="text-align: right;">
                                    <label for="exampleInputEmail1" class="form-label" style="font-size: 15px;">Email
                                        address</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="email" class="form-control" name="email"aria-describedby="emailHelp" value="<?php if(isset($_GET['email'])){echo $_GET['email'];} ?>">
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div></br>

                            <div class="row">
                                <div class="col-md-4" style="text-align: right;">
                                    <label for="exampleInputEmail1" class="form-label" style="font-size: 15px;">New Password </label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="new_pass" name="new_pass">
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div></br>

                            <div class="row">
                                <div class="col-md-4" style="text-align: right;">
                                    <label for="exampleInputEmail1" class="form-label" style="font-size: 15px;">Confirm Password</label>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="com_pass" name="com_pass">
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div></br>

                            <div class="row">
                            </div>
                            <center><button type="submit" class="btn btn-success" name="password_update" style="color: black; font-weight: bold;">Update Password</button>
                            </center><br>
                            <div class="alert alert-danger" id="error" style="display:none">
                                Email Address is wrong!
                            </div>
                            <div class="alert alert-danger" id="error1" style="display:none">
                                Somthing went wrong!
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
<?php
    if(isset($_POST['password_update'])){

        $email = mysqli_real_escape_string($con,$_POST['email']);
        $new_password = mysqli_real_escape_string($con,$_POST['new_pass']);
        $confirm_password = mysqli_real_escape_string($con,$_POST['com_pass']);

        $token = mysqli_real_escape_string($con,$_POST['password_token']);

        if(!empty($token))
        {
            if(!empty($email) && !empty($new_password) && !empty($confirm_password))
            {
                $check_token = "SELECT verify_token FROM user_info WHERE verify_token='$token' LIMIT 1";
                $check_token_run = mysqli_query($con,$check_token);
                
                if(mysqli_num_rows($check_token_run)>0)
                {
                    if($new_password == $confirm_password)
                    {
                        $password = $_POST['new_pass'];
                        $password1 =md5($password);
                        $update_password = "UPDATE user_info SET password='$password1' WHERE verify_token='$token' LIMIT 1";
                        $update_password_run = mysqli_query($con,$update_password);

                        if($update_password_run)
                        {
                            $new_token = md5(rand());
                            $update_new_token = "UPDATE user_info SET verify_token='$new_token' WHERE verify_token='$token' LIMIT 1";
                            $update_new_token_run = mysqli_query($con,$update_new_token);

                            echo"<center>
                            <div class='alert alert-success' style='width: 50%;'>
                            <a href='../index.php'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
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
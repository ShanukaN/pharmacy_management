<?php
session_start();
$page_title = "Password Reset Form";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shanuka</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="css/new.css">

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Shanuka</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class=""><a href="#">
                            <apan class="glyphicon glyphicon-home"></span> Home
                        </a></li>
                    <li><a href="product.php">
                            <apan class="glyphicon glyphicon-modal-window"></span> Product
                        </a></li>
                </ul>
            </div><!-- /.container-fluid -->
    </nav><br><br><br><br>
</head>

<body>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12" id=""></div>
                </div>
                <div class="panel panel-primary">
                    <div class="panel-heading" style="font-size: 20px;">
                        <center>
                            Forgot Password
                    </div>
                    </center>
                    <div class="panel-body">
                        <form action="" method="POST">
                            <div class="row">
                                <div class="col-md-4" style="text-align: right;">
                                    <label for="exampleInputEmail1" class="form-label" style="font-size: 20px;">Email
                                        address</label>
                                </div>
                                <div class="col-md-4">

                                    <input type="email" class="form-control" id="exampleInputEmail1" name="email"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="col-md-4">
                                </div>
                            </div></br>
                            <div class="row">

                            </div>
                            <center><button type="submit" class="btn btn-primary" name="password_reset_link">Send
                                    Password reset link</button>
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
include('db.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function send_password_reset($get_email,$token)
{
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->Username = "shanuka.nadee2021@gmail.com";
    $mail->Password = "Mallika@123";

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("shanuka.nadee2021@gmail.com");
    $mail->addAddress($get_email);

    $mail->isHTML(true);
    $mail->Subject = "Reset Password Notification";

    $email_template = "
    <h2>Hellow</h2>
    <h3> You are receiving this email because we received a password reset request for your account.</h3>
    <br/><br/>
    <a href='http://localhost/nade/user/password_change.php?token=$token&email=$get_email'> Clicl Me </a>
";

$mail->Body = $email_template;
$mail->send();   
}

if(isset($_POST['password_reset_link']))
{
    $email = mysqli_real_escape_string($con,$_POST['email']);
    $token = md5(rand());

    $check_email = "SELECT email FROM user_info WHERE email='$email' LIMIT 1";
    $check_email_run = mysqli_query($con,$check_email);

    if(mysqli_num_rows($check_email_run)>0){

        $row = mysqli_fetch_array($check_email_run);
        
        $get_email = $row['email'];
        
        $update_token = "UPDATE user_info SET verify_token='$token' WHERE email='$get_email' LIMIT 1";
        $update_token_run = mysqli_query($con,$update_token);

        if($update_token_run)
        {
            send_password_reset($get_email,$token);
            echo"<center>
            <div class='alert alert-success' style='width: 50%;'>
                <a href='password_reset.php' class='close' data-dismiss='alert' arial-label='close'><span aria-hidden='true'>&times;</span></a>
            <b>Email sent.</b>
            </div></center>
        ";
        
        }else{
            echo"<center>
            <div class='alert alert-danger' style='width: 50%;'>
            <a href='password_reset.php'  class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
            <b>Somthing went wrong.</b>
            </div></center>
        ";exit();
        }


    }else{
        echo"<center>
        <div class='alert alert-danger'style='width: 50%;'>
            <a href='password_reset.php' class='close' data-dismiss='alert' arial-label='Close'><span aria-hidden='true'>&times;</span></a>
        <b>Wrong email.</b>
        </div></center>
    ";exit();
    }

}
?>



</body>

</html>
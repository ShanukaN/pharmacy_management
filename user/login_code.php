<?php
include "db.php";

session_start();

$uname = $_SESSION['uname'];



if(isset($_POST["login"])){

    $email = mysqli_real_escape_string($con,$_POST["email"]);
    $password = md5($_POST["password"]);
    $sql = "SELECT * FROM `user_info` WHERE email='$email' AND `password`='$password' ";
    $run_query =mysqli_query($con,$sql);
    $count =mysqli_num_rows($run_query);
    if($count == 1){
        header('Location: profile.php');
        $row = mysqli_fetch_array($run_query);
        $_SESSION["uid"] = $row["user_id"];
        $_SESSION["name"] = $row["first_name"];
        $_SESSION["address"]=$row["address"];
        $_SESSION["email"]=$row["email"];
            
    }    else{
        $_SESSION['status'] = 'Username or password invalid';
        header('Location: login.php');
    }
    
}

?>
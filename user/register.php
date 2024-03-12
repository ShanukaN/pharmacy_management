<?php
include "db.php";

$f_name = $_POST["f_name"];
$l_name = $_POST["l_name"];
$email = $_POST["email"];
$password = $_POST['password'];
$c_password = $_POST['cpassword'];
$mobile = $_POST["mobile"];
$address = $_POST["address"];

$name = "/^[A-Z][a-zA-Z ]+$/";
$emailValid = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
$number = "/^[0-9]+$/";

if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($c_password) || empty($mobile) || empty($address) ){

    echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>Pleace Fill all the fields!</b>
        </div>
    
    ";
    exit();
}else{
    if(!preg_match($name,$f_name)){
        echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>this $f_name is not valid</b>
        </div>
        ";
        exit();
    }
    if(!preg_match($name,$l_name)){
        echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>this $l_name is not valid</b>
        </div>
        ";
        exit();
    }
    if(!preg_match($emailValid,$email)){
        echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>this $email address is not valid</b>
        </div>
        ";
        exit();
    }
    if(strlen($password) < 9){
        echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>Password is week</b>
        </div>
        ";
        exit();
    }
    if(strlen($c_password) < 9){
        echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>Password is week</b>
        </div>
        ";
        exit();
    }
    if($password != $c_password){
        echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>Password is not match</b>
        </div>
        ";
    }
    if(!preg_match($number,$mobile)){
        echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>Mobile number is not valid</b>
        </div>
        ";
        exit();
    }
    if(!(strlen($mobile) == 10)){
        echo "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>Mobile number must be 10 digit</b>
        </div>
        ";
        exit();
    }

//existing email 

    $sql = "SELECT user_id FROM user_info WHERE email='$email' LIMIT 1";
    $check_query = mysqli_query($con,$sql);
    $count_email = mysqli_num_rows($check_query);
    if($count_email > 0){
        echo "
            <div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>Email Address is already available Try another email address.</b>
            </div>
            ";
        exit();
    }else{
        $password =md5($password);
        $sql = "INSERT INTO `user_info`(`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address`) VALUES (NULL,'$f_name','$l_name','$email','$password','$mobile','$address')";
        $run_query = mysqli_query($con,$sql);
        if($run_query){
            echo "
            <div class='alert alert-success'>
                <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a><b>You are  Registered Successfull.</b>
            </div>
            ";
            
            exit();
        }
    }

}


?>
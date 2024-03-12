<?php

$servername = "localhost";
$username = "root";
$password = "";
$db = "shanuka";

$con = mysqli_connect($servername,$username,$password,$db);

if(!$con){
    die("Connection Faild!".mysqli_connect_error());
}

?>
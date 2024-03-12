<?php

include ('database/connection.php');
session_start();

    if(isset($_POST['login']))
    {
        if(empty($_POST['username']) || empty(['password']))
        {
            header("location:index.php?Empty= Pleace Fill in the Blanks");
        }
        else
        {
            $password = md5($_POST["password"]);
            $query="SELECT * FROM user WHERE username='".$_POST['username']."' and password='$password'";
            $result = mysqli_query($link,$query);

            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['username']=$_POST['username'];
                $_SESSION['uid']=$_POST['id'];
                header("location:home.php");
            }
            else
            {
                header("location:index.php?Invalid= Please Enter Correct User Name and Password");
            }
        }
    }
    else
    {
        echo "Not working";
    }

?>
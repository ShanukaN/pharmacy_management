<?php
session_start();
if(isset($_SESSION["uid"])){
    header("location:profile.php");
}

?>

<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.js"></script>
<script src="js/main.js"></script>

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

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
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
        <li class=""><a href="../index.php"><apan class="glyphicon glyphicon-home"></span> Home </a></li>
        <li><a href="product.php"><apan class="glyphicon glyphicon-modal-window"></span> Product</a></li>
        <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" autocomplete="off"></li>
        <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.php" type="button"><apan class="glyphicon glyphicon-shopping-cart"></span>Cart  <span class="badge11">0</span></a>
                </li>
                <li><a href="login.php"><apan class="glyphicon glyphicon-user"></span> Signin</a></li>
                <li><a href="signup.php"><apan class="glyphicon glyphicon-user"></span> SignUp</a></li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
</head>

<body>



    <p></p>
    </br></br></br>
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-2">
                <div id="get_category"></div>
                <!--<div class="nav nav-pills nav-stacked" >
                    <li class="active"><a href="#">Category</a></li>
                    <li><a href="#">Category</a></li>
                </div>-->
            </div>
            <div class="col-md-8">
                <div class="panel panel-primary">
                    <div class="panel-heading ">
                        <center> All Product</center>
                    </div>
                    
                    <div class="panel-body">
                        <div id="get_product"></div>
                        <!--<div class="col-md-4">
                            <div class="panel panel-info">
                                <div class="panel-heading">Panadol</div>
                                <div class="panel-body">
                                    <img src="" alt="">
                                </div>
                                <div class="panel-heading">Rs.10.00
                                    <button style="float:right;" class="btn btn-danger btn-xs">Att to cart</button>
                                </div>
                            </div>
                        </div>-->
                    </div>
                </div>

            </div>
            <div class="col-md-1"></div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <?php include('footer.php'); ?>
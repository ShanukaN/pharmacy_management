<?php

session_start();
if(!isset($_SESSION["uid"])){
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shanuka</title>

    <link rel="stylesheet" href="css/style.css">
    <script src="js/jquery.js"></script>
    <script src="js/main.js"></script>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>


</head>
<body>

    <<nav class="navbar navbar-inverse navbar-fixed-top">
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
        <li class=""><a href="#"><apan class="glyphicon glyphicon-home"></span> Home </a></li>
        <li><a href="profile.php"><apan class="glyphicon glyphicon-modal-window"></span> Product</a></li>
      </ul>
        </div>
    </div>
</nav> 
</br></br></br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="cart_msg">
            <!--cart msg-->
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="error_msg">
            <!--cart msg-->
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><center><h1>Checkout</h1></center></div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-2"><b>Action</b></div>
                        <div class="col-md-2"><b>Product Image</b></div>
                        <div class="col-md-2"><b>Product Name</b></div>
                        <div class="col-md-2"><b>Quantity</b></div>
                        <div class="col-md-2"><b>Price</b></div>
                        <div class="col-md-2"><b>Total Price</b></div>
                    </div><br>
                    <div id="cart_checkout"></div>
                    <!--<div class="row">
                        <div class="col-md-2">
                            <div class="btn-gropu">
                                <a href='#' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></a>
                                <a href='#' class='btn btn-primary'><span class='glyphicon glyphicon-ok-sign'></span></a>
                            </div>
                        </div>
                        <div class="col-md-2">Product Image</div>
                        <div class="col-md-2">Product Name</div>
                        <div class="col-md-2">Price</div>
                        <div class="col-md-2">Quantity</div>
                        <div class="col-md-2">Total Pric</div>
                    </div>-->
                    <!--<div class="row">
                        <div class="col-md-8"></div>
                        <div class="col-md-4">
                            <b>Total Rs500</b>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

</body>
   
</html>
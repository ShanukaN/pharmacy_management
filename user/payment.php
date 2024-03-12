<?php
include("db.php");
session_start();
if(!isset($_SESSION["uid"])){
    header("location:../index.php");
    $uemail = $_SESSION["email"];

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
        integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css"
        integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"
        integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

</head>

<body>

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

            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class=""><a href="../index.php">
                            <apan class="glyphicon glyphicon-home"></span> Home
                        </a></li>
                    <li><a href="profile.php">
                            <apan class="glyphicon glyphicon-modal-window"></span> Product
                        </a></li>
                    <li><a href="pris.php">
                            <apan class="glyphicon glyphicon-picture"></span> Priscription
                        </a></li>
                    <li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search"
                            autocomplete="off"></li>
                    <li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn">Search</button></li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li><a href="order_details.php">
                            <apan class="glyphicon glyphicon-inbox"></span> Order
                        </a>
                    </li>
                    <li><a href="#" id="cart_add" class="dropdown-toggle" data-toggle="dropdown">
                            <apan class="glyphicon glyphicon-shopping-cart"></span> Cart <span class="badge">0</span>
                        </a>
                        <div class="dropdown-menu" style="width:400px;">
                            <div class="panel panel-success">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-md-3">Sl.No</div>
                                        <div class="col-md-3">Product Image</div>
                                        <div class="col-md-3">Product Name</div>
                                        <div class="col-md-3">Price</div>
                                    </div>
                                </div>
                                <div class="panel-body">
                                    <div id="cart_product">
                                        <!--<div class="row">
                                        <div class="col-md-3">Sl.No</div>
                                        <div class="col-md-3">Product Image</div>
                                        <div class="col-md-3">Product Name</div>
                                        <div class="col-md-3">Price</div>
                                    </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <apan class="glyphicon glyphicon-user"></span><?php echo $_SESSION["name"]; ?>
                        </a>
                        <ul class="dropdown-menu" style="background: rgb(23, 146, 33);">
                            <li><a href="cart.php" style="text-decoration:none; color:blue;"><span
                                        class="glyphicon glyphicon-shopping-cart"> Cart</span></a></li>
                            <li class="divider"></li>
                            <li><a href="password_reset.php" style="text-decoration:none; color:blue;"><span
                                        class="glyphicon glyphicon-pencil"> Change Password</span></a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php" style="text-decoration:none; color:blue;"><span
                                        class="glyphicon glyphicon-off"> Logout</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br><br><br>

    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8" id="si_msg">
            </div>
            <div class="col-md-2"></div>
        </div>
        <div class="row">
            <form action="payment_process.php" method="POST" id="myform">
                <div class="col-md-6">
                    <div class="panel panel-primary" style="border-style: hidden;">
                        <div class="panel-heading">
                            <center> Priscription Notification</center>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <?php
                                    $uid = $_SESSION["uid"];
                                    $total_amt = 0;
                                    $res=mysqli_query($con,"SELECT * FROM `cart` WHERE user_id='$uid' AND state='pending'");
                                    while($row=mysqli_fetch_array($res)){
                                        $name=$row["product_name"];
                                        $image=$row["product_image"];
                                        $qty=$row["qty"];
                                        $price=$row["total_amt"];
                                        $total = $row["total_amt"];

                                        $total_array = array($total);
                                        $total_sum = array_sum($total_array);
                                        $total_amt = $total_amt + $total_sum;
                                ?>
                                <div class="row">
                                    <center>
                                        <div class="col-md-3"><img src="../Admin/<?php echo $image;?>" alt=""
                                                style="width: 100px;height: 100px;"></div>

                                        <div class='col-md-3'><input type="text" name="item_name[]" required=""
                                                class="form-control" value="<?php echo $name;?>" readonly></div>
                                        <div class='col-md-3'><input type="text" name="qty[]" required=""
                                                class="form-control" value="<?php echo $qty;?>" readonly></div>
                                        <div class='col-md-3'><input type="text" name="price[]" required=""
                                                class="form-control" value="<?php echo $price;?>" readonly></div>
                                    </center>
                                </div>


                                <?php
                  
                                    }
                                ?>
                            </div>
                            <br>
                            <div class="row">
                                <center>
                                    <b>Total Price: <input type="text" name="total_price" required=""
                                            class="form-control" value="<?php echo $total_amt;?>" readonly></b>
                                </center>
                            </div>
                        </div>
                    </div>

                </div>



                <div class="col-md-6">
                    <?php
                        $uid = $_SESSION["uid"];
                        $res=mysqli_query($con,"SELECT * FROM `user_info` WHERE user_id=$uid");  
                        while($row=mysqli_fetch_array($res))
                        {
                            $us_id = $row["user_id"]; 
                            $fname = $row["first_name"]; 
                            $lname = $row["last_name"]; 
                            $email = $row["email"]; 
                            $address = $row["address"]; 
                            $mobile = $row["mobile"]; 
    
                        }
                    ?>


                    <div class="row">
                        <div class="col-md-12" id="product_msg"></div>
                    </div>
                    <div class="panel panel-primary" style="height: 705px; border-style: hidden;">
                        <div class="panel-heading ">
                            <center> Your Details</center>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <input type="hidden" class="form-control" id="uid" name="uid"
                                        value="<?php echo $us_id;?>" required>
                                    <label>First Name</label>
                                </div>
                                <div class="col-md-4">
                                    <label>Last Name</label>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="fname" name="fname"
                                        value="<?php echo $fname;?>" required>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" id="lname" name="lname"
                                        value="<?php echo $lname;?>" required>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <label for="exampleInputEmail1">Email address</label>
                                    <input type="email" class="form-control" id="email" name="email"
                                        value="<?php echo $email;?>" required>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <label>Telephone Number</label>
                                    <input type="text" class="form-control" id="tel" name="tel"
                                        value="<?php echo $mobile;?>" required>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <label for="exampleInputEmail1">Address</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        value="<?php echo $address;?>" required>
                                </div>
                                <div class="col-md-2"></div>
                            </div>
                        </div></br>

                        <div class="row">
                        </div>
                        <center><input type="submit" name="save" id="save" class="btn btn-primary">
                        </center><br>
                    </div>
                </div>
        </div>
        <div class="col-md-1"></div>
        <h4 class="sent-notification"></h4>
        </form>
    </div>
    </div>


    <script src="https://code.jquery.com/jquery-1.12.4.min.js"
        integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous">
    </script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->




</body>
</html>
<?php
include("user/db.php");
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Yuji+Mai&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <script src="user/js/jquery.js"></script>

    <link rel="stylesheet" href="user/css/home1.css">
    <script src="home.js"></script>
    <title>Shanuka Pharmacy</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark navbar-fixed" style="background: #2B2B2B;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"
                style=" margin-left: 50px; font-size: 20px; font-family: 'Yuji Mai', serif;">Shanuka</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0" style=" margin-left: 5%; font-size: 18px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="home.php"><i class="fas fa-home"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="user/product.php"><i class="fas fa-book"></i> product</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="px-2 search" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn0" type="submit">Search</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                </form>
                <ul>
                    <li>
                    <a class="btn"  href="user/login.php" role="button" style="margin-top: 0px; color:white;" ><i class="fas fa-user"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="main">
        <div class="container py-5">
            <div class="row py-3">
                <div class="col-lg-5 pt-5 text-center">
                    <h1 class="pt-5">Protect Yourself from Coronavirus.</h1>
                    <a class="btn btn-primary btn1 mt-3"  href="user/product.php" role="button">Shop</a>
                </div>
            </div>
        </div>
    </section>

    <section class="item">
        <div class="container py-5">
            <div><hr style="height: 12px;"></div>
            <div class="row ">
                <div class="col-lg-5 py-5 m-auto text-center">
                    <h1>Find Your Best Products.</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 text-center">
                    <div class="card border-0 bg-light">
                        <div class="card-body" >
                            <img src="user/image/medi.jpg" style="height: 200px; width: 200px;" class="img-fluid" alt="">
                        </div>
                        <h3>Best Medicine</h3>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <img src="user/image/ba.png" style="height: 200px; width: 200px;" class="img-fluid" alt="">
                        </div>
                        <h3>Baby Items</h3>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <img src="user/image/de.jpg" style="height: 200px; width: 200px;" class="img-fluid" alt="">
                        </div>
                        <h3>Home Delivery</h3>
                    </div>
                </div>
                <div class="col-lg-3 text-center">
                    <div class="card border-0 bg-light">
                        <div class="card-body">
                            <img src="user/image/gym.jpg" style="height: 200px; width: 200px;" class="img-fluid" alt="">
                        </div>
                        <h3>High Proteins</h3>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="product">
        <div class="container py-5">
        <div><hr style="  border: 5px solid rgb(4, 2, 168); border-radius: 8px;"></div>
            <div class="row ">
                <div class="col-lg-5 py-5 m-auto text-center">
                    <h1>Explore Our Store</h1>
                </div>
            </div>
            <div class="row">
                <?php
                    $product_query = "SELECT * FROM item WHERE qty>re_order_qty ORDER BY RAND() LIMIT 0,4";
                    $run_query = mysqli_query($con,$product_query);
                        if(mysqli_num_rows($run_query) > 0){
                            while($row = mysqli_fetch_array($run_query)){
                          ?>
                    <div class="col-lg-3 text-center new" >
                        <div class="card border-0 bg-light" >
                            <div class="card-body">
                                <img src="Admin/<?php echo $row['item_image']; ?>" style="height: 250px; width: 400px;" class="img-fluid" alt="">
                            </div>
                        <h6><?php echo $row['item_name']; ?></h6>
                        <h6>Rs.<?php echo $row['price']; ?>.00</h6>
                        </div>
                    </div>
                <?php          
                      }
                  }
                ?>
            </div>
            <br>
            <div class="row">
                  <div class="col-lg-6 text-center m-auto">
                  <a class="btn btn-primary btn2"  href="user/product.php" role="button">Shop</a>
                  </div>
            </div>
        </div>
    </section>

    <section class="about">
        <div class="container py-5">
            <div class="row py-3">
                <div class="col-lg-5 pt-5 text-center">
                    <h1 class="pt-5">This is Online Pharmacy website.</h1>
                    <a class="btn btn-primary btn3 mt-3"  href="user/aboutus.php" role="button">More Us</a>
                </div>
            </div>
        </div>
    </section>

    <section class="contact py-5">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-5 m-auto text-center">
                  <h1>Contatct Us</h1>
                  <h6 sys_get_temp_dir="color:red;">Always Be In Touch With Us.</h6>
                </div>
            </div>
            <div class="row py-5">
                <div class="col-lg-9 m-auto">
                <form action="" method="POST">
                    <div class="row">
                        <div class="col-lg-4">
                            <h6>Location</h6>
                            <p>Mirigama</p>

                            <h6>Phone</h6>
                            <p>+9471-7535244</p>

                            <h6>Email</h6>
                            <p>shanuka.nadee2021@gmail.com</p>
                        </div>
                        
                        <div class="col-lg-7">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" class="form-control bg-light" placeholder="First Name" name="fname">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control bg-light" placeholder="Last Name" name="lname">
                                </div>
                            </div>
                            <div class="row">
                            <div class="col-lg-12 py-3">
                                <textarea class="form-control bg-light" id="" placeholder="Enter Your Comment" cols="30" rows="5" name="cmt"></textarea>
                            </div>
                        </div>
                        <button class="btn1" name="submit" type="submit" name="submit">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </section>


    <section class="news">
        <div class="container">
            <div class="row">
                  <div class="col-lg-11 m-auto text-center">
                        <h1>About Us</h1>
                  </div>
            </div>
            <div class="row">
                  <div class="row text-center">
                        <div class="col-lg-4 py-3">
                            <h5>CUSTOMER CARE</h5>
                            <p>On Time</p>
                            <p>Always Care</p>
                        </div>
                        <div class="col-lg-4 py-3">
                            <h5></h5>
                            <p></p>
                            <p></p>
                            <a href="user/signup.php">Signup</a><br>
                            <a href="user/product.php">Product</a>
                        </div>
                        <div class="col-lg-4 py-3">
                            <h5>SOCIAL MEDIA</h5>
                            <span><i class="fab fa-facebook"></i></span>
                            <span><i class="fab fa-twitter"></i></span>
                            <span><i class="fab fa-instagram"></i></span>
                        </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

<?php
if(isset($_POST['submit']))
{


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $cmt = $_POST['cmt'];



    $query = "INSERT INTO `comment`(`f_name`, `l_name`, `cmt`) VALUES ('$fname','$lname','$cmt')";
     $result =mysqli_query($con,$query);
}
?>


</body>
</html>

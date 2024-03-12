<?php 
session_start(); 

if(isset($_SESSION['username']))
{

}
else{
    header("location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy</title>
    <link rel="stylesheet" href="css/mdb.min.css" />
    <link rel="stylesheet" href="css/dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
        integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
        integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css"
        integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
    <script type="text/javascript" src="./js/main.js"></script>
</head>

<body>
    <?php include('includes/navbar.php'); ?>
    </br></br>

    <div class="t">
        <div class="row">
            <div class="col-md-4">
                <div class="card mx-auto">
                    <img src="./img/user1.png" class="card-img-top mx-auto" style="width:30%" alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Profile Info </h5></br>
                        <p class="card-text"><i class="fa fa-user">&nbsp;</i>Shanuka</p></br>
                        <p class="card-text"><i class="fa fa-user">&nbsp;</i>Admin</p>
                        </br>
                        <a href="edit_profile.php" class="btn btn-primary"><i class="fa fa-edit">&nbsp;&nbsp;</i>Edite
                            Profile</a>
                        <a href="logout.php?logout" class="btn btn-danger"><i
                                class="fa fa-edit">&nbsp;&nbsp;</i>Logout</a>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="jumbotron" style="width:100%; height:100%;">
                    <h1>
                        <center>Welcome</center>
                    </h1>
                    <div class="row">
                        <div class="col-sm-6">
                            <iframe
                                src="https://free.timeanddate.com/clock/i7xi4415/n1925/szw160/szh160/hoc000/hbw2/hfceee/cf100/hncccc/fdi76/mqc000/mql10/mqw4/mqd98/mhc000/mhl10/mhw4/mhd98/mmc000/mml10/mmw1/mmd98"
                                frameborder="0" width="160" height="160"></iframe>

                        </div>
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-body" style="width: 20rem;">
                                    <h5 class="card-title">New Orders </h5>
                                    <p class="card-text">With supporting text below as a natural lead-in to additional
                                        content.</p>
                                    <a href="#" class="btn btn-primary">New Order</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p></p>
        <p></p>
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Sell Item</h5>
                        <p class="card-text">Here you can manage your buy item.</p>
                        <a href="sell.php" class="btn btn-primary">Sell</a>&nbsp;
                        <a href="Sell_item_stock.php" class="btn btn-success">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Buy Item</h5>
                        <p class="card-text">Here you can Sell and Manage item.</p>
                        <a href="buy_item.php" class="btn btn-primary">Buy</a>&nbsp;
                        <a href="buy_drugs_report/buy_item_report.php" class="btn btn-success">View</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Store</h5>
                        <p class="card-text">Here you can manage youre store.</p>
                        <a href="store.php" class="btn btn-primary">Store</a>&nbsp;
                        <a href="low_stock.php" class="btn btn-primary">Low Stock</a>
                        <a href="addcategory.php" class="btn btn-primary">Add Category</a>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Online Order</h5>
                        <p class="card-text">Here you can manage your online orders.</p>
                        <a href="priscription.php" class="btn btn-primary">Priscription</a>&nbsp;
                        <a href="" class="btn btn-success">View</a>
                    </div>
                </div>
            </div>
        </div>
    </div>




</body>

</html>
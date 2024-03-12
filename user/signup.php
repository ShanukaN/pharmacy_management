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
        <li class=""><a href="../index.php"><apan class="glyphicon glyphicon-home"></span> Home </a></li>
      </ul>
        </div>
    </div>
</nav> 
</br></br></br></br>

<div class="container-fluid">
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8" id="si_msg">
        </div>
        <div class="col-md-2"></div>
    </div>
    <div class="row">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="panel panel-primary">
                <div class="panel-heading"><center>SignUp </center></div>
                <div class="panel-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="f_name">First Name</label>
                                <input type="text" id="f_name" name="f_name" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="l_name">Last Name</label>
                                <input type="text" id="l_name" name="l_name" class="form-control">
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <input type="text" id="email" name="email" class="form-control">
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label for="cpassword">Confirm Password</label>
                                <input type="password" id="cpassword" name="cpassword" class="form-control">
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="mobile">Mobile</label>
                                <input type="text" id="mobile" name="mobile" class="form-control">
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="address">Address</label>
                                <input type="text" id="address" name="address" class="form-control">
                            </div>
                        </div></br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="button" style="float:right;" value="Sign Up" id="signup_btn" name="signup_btn" class="btn btn-success btn-lg">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>

</body>
</html>
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Yuji+Mai&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

<nav class="navbar navbar-expand-lg navbar-dark navbar-fixed" style="background: #2B2B2B;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style=" margin-left: 50px; font-size: 20px; font-family: 'Yuji Mai', serif;">Shanuka</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

      <ul class="navbar-nav me-auto mb-2 mb-lg-0" style=" margin-left: 5%; font-size: 18px;">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="../index.php"><i class="fas fa-home"></i>
                            Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="product.php"><i class="fas fa-book"></i> product</a>
                    </li>
                </ul>
    </div>
  </div>
</nav>

</head>
<body>
	<img class="wave" src="image/wave.png">
	<div class="container">
		<div class="img">
			<img src="image/bg.svg">
		</div>
		<div class="login-content">
			<form action="login_code.php" method="POST">
				<img src="image/avatar.svg">
				<h2 class="title">Welcome</h2>
                <?php
                     if(isset($_SESSION['status']) && $_SESSION['status'] !='')
                    {
                        echo '<div class="text-center"><p class="bg-danger text-white"> '.$_SESSION['status'].' </p></div>';
                        unset($_SESSION['status']);
                    }
                ?>
           		<div class="input-div one">
           		   <div class="i">
           		   		<i class="fas fa-user"></i>
           		   </div>
           		   <div class="div">
           		   		<h5>Email</h5>
           		   		<input type="email" class="input" id="email" name="email" required/>
           		   </div>
           		</div>
           		<div class="input-div pass">
           		   <div class="i"> 
           		    	<i class="fas fa-lock"></i>
           		   </div>
           		   <div class="div">
           		    	<h5>Password</h5>
           		    	<input type="password" class="input" name="password" required/>
            	   </div>
            	</div>
            	<a href="password_reset.php">Forgot Password?</a>
            	<input type="submit" class="btn" value="Login" name="login">
                <a href="signup.php">SignUp</a>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/login.js"></script>


</body>
</html>

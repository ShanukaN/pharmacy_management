<?php include('includes/header.php'); ?>
<div class="container">

    </br></br>
    <div class="card mx-auto" style="width: 20rem;">
        <img src="./img/login.png" class="card-img-top mx-auto" style="width:60%" alt="Login Icon">
        <div class="card-body">
            <form action="login_code.php" method="POST">
                <div class="form-group">
                    <label for="username">User Name</label>
                    <input type="text" class="form-control" id="" name="username">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                </div>
                <?php
                    if(@$_GET['Empty']==true)
                    {
                ?>
                <div class="alert-light text-danger text-center"><?php echo $_GET['Empty'] ?></div>
                <?php
                    }
                ?>

                <?php
                    if(@$_GET['Invalid']==true)
                    {
                ?>
                <div class="alert-light text-danger text-center"><?php echo $_GET['Invalid'] ?></div>
                <?php
                    }
                ?>

                </br>
                <button type="submit" class="btn btn-primary" name="login"><i
                        class="fa fa-lock">&nbsp;</i>Login</button>
            </form>
        </div class="forgot-btn">
        <div class="card-footer"><a href="password_reset.php">Forget Password ?</a></div>
    </div>
</div>


</body>

</html>
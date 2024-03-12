<?php 
session_start(); 

if(isset($_SESSION['username']))
{

}
else
{
    header("location:index.php");
}
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php 
include ('database/connection.php');
?>
<?php

$id="";
$fname="";
$lname="";
$username="";
$password="";
$email="";

$query="SELECT * FROM `user`";
$result=mysqli_query($link,$query); 
while($row=mysqli_fetch_array($result))
{
    $id=$row["id"];
    $fname=$row["firstname"];
    $lname=$row["lastname"];
    $username=$row["username"];
    $password=$row["password"];
    $email=$row["email"];

}
?>


</br></br>
<div class="s">
    <div class="container" >
        <div class="ai">
        <h2>Edit Profile</h2>
        </div></br>
        <div class="t">
            <form class="row g-3" method="POST">
                
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">First Name</label>
                    <input type="text" class="form-control" id="fname" name="fname" value="<?php echo $fname;?>">
                </div>
                <div class="col-md-6">
                    <label for="inputPassword4" class="form-label">Last Name</label>
                    <input type="text" class="form-control" id="lname" name="lname" value="<?php echo $lname;?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username;?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Password</label>
                    <input type="password" class="form-control" id="pass" name="pass" value="<?php echo $password;?>">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="<?php echo $email;?>">
                </div>
                <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary" name="submit1" id="submit1" >Update</button>
                </div>
                <div class="alert alert-success" id="success" style="display:none" >
                        Update Successfully!
                </div>
            </form>       
        </div>
    </div>
</div>


<?php
if(isset($_POST["submit1"]))
{    

    $password = $_POST['pass'];
    $password1 =md5($password);
    mysqli_query($link,"UPDATE `user` SET `firstname`='$_POST[fname]',`lastname`='$_POST[lname]',`username`='$_POST[username]',`password`='$password1',`email`='$_POST[email]' WHERE id=$id") or die(mysqli_error($link));  

    ?>
    <script type="text/javascript"> 
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location.href= window.location.href;
        },800);       
    </script>
    <?php
}

?>
</body>
</html>
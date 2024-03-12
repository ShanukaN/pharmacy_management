<?php
session_start(); 
include('database/connection.php');
include('includes/header.php');
include('includes/navbar.php');
?>

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';



$id=$_GET["id"];
$cus_name="";
$address="";
$image="";
$email="";


$res=mysqli_query($link,"SELECT * FROM `pris` WHERE id=$id");  
while($row=mysqli_fetch_array($res))
{
    $is=$row["id"];
    $cus_name=$row["cus_name"];
    $address=$row["address"];
    $image=$row["image"];
    $email=$row["email"];

}
?>

<br><br><br>

<div class="card" style="padding: 2px; margin: 40px 40px;">
    <div class="card-header">
        Customer Order
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <img src="<?php echo $image;?>" class="img-fluid" style="width: 705px;height: 517px;">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="<?php echo $image;?>" class="btn" download>Download</a>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Customer Name</label>
                                <input type="text" class="form-control" name="cus_name" value="<?php echo $cus_name;?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Address</label>
                                <input type="text" class="form-control" name="address" value="<?php echo $address;?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Email</label>
                                <input type="text" class="form-control" name="email" value="<?php echo $email;?>"
                                    required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Notify</label>
                                <textarea type="text" class="form-control" name="notify" style="height: 150px;"
                                    required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
if(isset($_POST["submit"])){

$name = $_POST["cus_name"];
$address = $_POST["address"]; 
$email = $_POST["email"];     
$ms = $_POST["notify"];

$query ="UPDATE `pris` SET `cus_name`='$name',`address`='$address',`email`='$email',`status`='delivered', `ms`='$ms' WHERE `id`=$id";
$result = mysqli_query($link,$query);
?>
    <script type="text/javascript"> 

        setTimeout(function(){
          window.location="priscription.php";
        },800);       
    </script>
<?php
if($result)
        {
            send_email($email);
        }
        else
        {
            alert("Error");
        }
}
?>



<?php



function send_email($email)
{
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->SMTPAuth = true;

    $mail->Host = "smtp.gmail.com";
    $mail->Username = "shanuka.nadee2021@gmail.com";
    $mail->Password = "Mallika@123";

    $mail->SMTPSecure = "tls";
    $mail->Port = 587;

    $mail->setFrom("shanuka.nadee2021@gmail.com");
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = "Shanuka Pharmacy";

    $email_template = "
    <h1>Your order is now processing.</h1><h1 style='color: red;'> Check your profile</h1><br>
    

    <br/><br/>
    
";

    $mail->Body = $email_template;
    $mail->send();   
}

?>



<?php  include('includes/footer.php');?>
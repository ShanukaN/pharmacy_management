<?php
  
  include("db.php");

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\SMTP;
  use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

    if(isset($_POST['save'])){
    
  
        $item_name= $_POST["item_name"];
        $qty= $_POST["qty"];
        $price= $_POST["price"];
          
  
        $u_id= $_POST["uid"];
        $f_name= $_POST["fname"];
        $l_name= $_POST["lname"];
        $email1= $_POST["email"];
        $tel1= $_POST["tel"];
        $address1= $_POST["address"];
        $total_price=$_POST["total_price"];
    
  
      $query ="INSERT INTO `order`(`u_id`, `f_name`, `l_name`, `email`, `tel`, `address`, `total_price`, `state`) VALUES ('$u_id','$f_name','$l_name','$email1','$tel1','$address1','$total_price','pending')";
      if($con->query($query)){
          $id = $con->insert_id;
          $cquery="";
          $count = count($_POST['item_name']);

          foreach($item_name as $index => $itm){
  
          $item1 = $itm;
          $qty1 = $qty[$index];
          $price1 = $price[$index];
          
  
          $sql = "INSERT INTO `order_details`(`id`, `order_no`, `item_name`, `qty`, `price`) 
          VALUES (NULL, $id, '$item1', '$qty1', '$price1')";
          $run_query = mysqli_query($con,$sql);
          
          }
          if($con->multi_query($cquery)){
              echo"Savved";
          }if($run_query)
          {
            mysqli_query($con,"DELETE FROM `cart` WHERE user_id='$u_id'");
            send_email($email1);
            header("location:product.php");
          }
      
      }else
      {
          echo "Fail";
      }
  
  }
  
    ?>
    
<?php



function send_email($email1)
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
    $mail->addAddress($email1);

    $mail->isHTML(true);
    $mail->Subject = "Shanuka Pharmacy";

    $email_template = "
    <center><h1>Thanks You.</h1></center>
    <hr>
    <h2>Your order is now processing.</h2>
    <h3 style='color: red;'> Check your profile</h3>
    <h3>Contact Us : 071-7535244<h3>

    <br/><br/>
    
";

    $mail->Body = $email_template;
    $mail->send();   
}

?>
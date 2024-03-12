<?php  
include('includes/header.php');
?>
<?php  
include('includes/navbar.php');
?>
<?php

include('database/connection.php');
  

$id=$_GET["id"];
$supid="";
$supname="";
$address="";
$contact="";
$company="";

$res=mysqli_query($link,"SELECT * FROM `supplier` WHERE id=$id");  
while($row=mysqli_fetch_array($res))
{
    $supid=$row["supid"];
    $supname=$row["supname"];
    $address=$row["address"];
    $contact=$row["contact"];
    $company=$row["company"];
}

?>
</br></br>
<link rel="stylesheet" href="css/style.css"> 
<div class="s">
  <div class="container" >
    <div class="ai">
      <h2>Edit Supplier</h2>
    </div>
    <form class="n" action="" method="POST" name="form1">
    <input type="hidden"  id="id"  name="id"> 
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label" >Supplier ID</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="supid"  name="supid" readonly  value="<?php echo $supid;?>">
          <br>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="sname"  name="supname" value="<?php echo $supname;?>">
          <br>
        </div>
      </div>   
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="address"  name="address" value="<?php echo $address;?>">
          
        </div>
      </div>
      <br>
    
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Contact No</label>
        <div class="col-sm-10">
          <input type="tel" class="form-control" id="contact"  name="contact" value="<?php echo $contact;?>"> 
          
        </div>
      </div>
      <br>
     
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="company"  name="company" value="<?php echo $company;?>">
          
        </div>
      </div>
      <br>
        <div class="alert alert-danger" id="error" style="display:none" >
                Please fill all the field.
      </div>
      <div class="alert alert-danger" id="tel1" style="display:none" >
                Please enter number only
      </div>
      <div class="alert alert-danger" id="tel2" style="display:none" >
                Mobile number must be 10 digit
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" name="submit1"  id="submit">Update</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="supplier.php" class="btn btn-primary">Back</a>
      </div>

        <div class="alert alert-success" id="success" style="display:none" >
                Supplier Updated Successfully!
        </div>
    </form>
  </div>
    <br>
<div>

<?php
$number = "/^[0-9]+$/";

if(isset($_POST["submit1"])){

$sname = $_POST["supname"];
$saddress = $_POST["address"];
$stel = $_POST["contact"];
$scompany = $_POST["company"];

  if(empty($sname) || empty($saddress) || empty($stel) || empty($scompany) || empty($supid) ){

    ?>
    <script type="text/javascript"> 
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
        setTimeout(function(){
          window.location.href= window.location.href;
        },3000);
    </script>
    <?php
  exit();
  }else{
    if(!preg_match($number,$stel)){
      ?>
    <script type="text/javascript"> 
        document.getElementById("success").style.display="none";
        document.getElementById("tel1").style.display="block";
        setTimeout(function(){
          window.location.href= window.location.href;
        },3000);
    </script>
    <?php
      exit();
  }
  if(!(strlen($stel) == 10)){
    ?>
    <script type="text/javascript"> 
        document.getElementById("success").style.display="none";
        document.getElementById("tel2").style.display="block";
        setTimeout(function(){
          window.location.href= window.location.href;
        },3000);
    </script>
    <?php
      exit();
  }

    mysqli_query($link,"UPDATE `supplier` SET supname='$sname', address='$saddress',contact='$stel',company='$scompany' WHERE id=$id") or die(mysqli_error($link));  

    ?>
    <script type="text/javascript"> 
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location="supplier.php";
        },800);       
    </script>
    <?php
  }
}




?>
  


<?php  
include('includes/footer.php');

?>
<?php  
include('includes/header.php');
?>
<?php  
include('includes/navbar.php');
?>
<?php

include('database/connection.php');
  

$id=$_GET["id"];
$catname="";


$res=mysqli_query($link,"SELECT * FROM `category` WHERE id=$id");  
while($row=mysqli_fetch_array($res))
{
    $catname=$row["cat_name"];

}

?>
</br></br>
<link rel="stylesheet" href="css/style.css"> 
<div class="s">
  <div class="container" >
    <div class="ai">
      <h2>Edit Category</h2>
    </div>
    <form class="n" action="" method="POST" name="form1">
    <input type="hidden"  id="id"  name="id"> 
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="category"  name="category" value="<?php echo $catname;?>">
          <br>
        </div>
      </div>   
      <br>
      <div class="alert alert-danger" id="error" style="display:none" >
                This Category Already Exist!
      </div>
      <div class="alert alert-danger" id="capital" style="display:none" >
                The first word is to use capital.
      </div>
      <div class="alert alert-danger" id="empty" style="display:none" >
                Please fill all the field.
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" name="submit1"  id="submit">Update</button>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <a href="addcategory.php" class="btn btn-primary">Back</a>
      </div>

        <div class="alert alert-success" id="success" style="display:none" >
                Category Updated Successfully!
        </div>
    </form>
  </div>
    <br>
<div>

<?php

$name = "/^[A-Z][a-zA-Z ]+$/";

if(isset($_POST["submit1"]))
{ 
  $count=0;
  $res=mysqli_query($link,"SELECT * FROM `category` WHERE cat_name='$_POST[category]'");
  $count=mysqli_num_rows($res);

  if($count>0)
  {
    ?>
    <script type="text/javascript"> 
        document.getElementById("success").style.display="none";
        document.getElementById("error").style.display="block";
        setTimeout(function(){
          window.location.href= window.location.href;
        },3000);
    </script>
    <?php
  }
  else{
    if(!preg_match($name,$_POST['category'])){
      ?>
    <script type="text/javascript"> 
        document.getElementById("success").style.display="none";
        document.getElementById("capital").style.display="block";
        setTimeout(function(){
          window.location.href= window.location.href;
        },3000);
    </script>
    <?php
    exit();
  }
    mysqli_query($link,"UPDATE `category` SET cat_name='$_POST[category]' WHERE id=$id") or die(mysqli_error($link));  
  
    ?>
    <script type="text/javascript">

        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location="addcategory.php";
        },800);       
    </script>
    <?php
}
}

if(isset($_POST["submit2"])){
  
}

?>
  


<?php  
include('includes/footer.php');

?>
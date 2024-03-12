<?php  
include('includes/header.php');
?>
<?php  
include('includes/navbar.php');
?>
<?php
include('database/connection.php');

$id=$_GET["id"];
$cate=$_GET["category"];
$item_id="";
$item_name="";
$category="";
$description="";
$price="";
$brand="";
$reorder="";
$item_image="";


$res=mysqli_query($link,"SELECT * FROM `item` WHERE id=$id");  
while($row=mysqli_fetch_array($res))
{
    $item_id=$row["item_id"];
    $item_name=$row["item_name"];
    $category=$row["category"];
    $description=$row["description"];
    $price=$row["price"];
    $brand=$row["brand"];
    $reorder=$row["re_order_qty"];
    $item_image=$row["item_image"];
    
}


?>
</br></br>
<link rel="stylesheet" href="css/style.css"> 
<div class="s">
  <div class="container" >
    <div class="ai">
      <h2>Edit Item</h2>
    </div>
    <form class="n" action="" method="POST" enctype="multipart/form-data">  
                    <div class="modal-body">           
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Item ID</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control"   name="item_id" readonly value="<?php echo $item_id;?>" >
                                <br>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"   name="item_name" value="<?php echo $item_name;?>" required>
                            <br>
                            </div>
                        </div>

                        <?php 
                
                        $sql = "SELECT * FROM `category` ";
                        $res = mysqli_query($link, $sql);
                
                        ?>
                        <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label"  required>Category</label>
                        <div class="col-sm-10">
                            <select id="cat" name="category" value="<?php echo $rows['cat_name']; ?>">
                                <option value="<?php echo $category;?>"><?php echo $category;?></option>
                                    <?php while($rows = mysqli_fetch_array($res)){ ?>
                                <option value="<?php echo $rows['cat_name']; ?>"><?php echo $rows['cat_name'] ?></option>
                                <?php
                                }?>
                            </select>
                        </div>
                        </div>

                        <br>
                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control"  name="description" value="<?php echo $description;?>" required> 
                            </div>
                        </div>
                        <br>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Price (Rs.)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"   name="price" value="<?php echo $price;?>" required>
                            <br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"   name="brand" value="<?php echo $brand;?>" required>
                            <br>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Re Order Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"   name="re_order_qty" value="<?php echo $reorder;?>" required>
                            <br>
                            </div>
                        </div>

                        <br>
                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Item Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="item_image" requred  name="item_image"value="<?php echo $item_image;?>">  
                                <img src="<?php echo $item_image;?>" width="500", hight="500">
                            </div>
                        </div>
                        
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary" name="submit1"  id="submit">Submit</button>
                        </div>
                    
                        <div class="alert alert-success" id="success" style="display:none" >
                                Supplier Added Successfully!
                        </div>
                    </div>                
    </form>

  </div>
  <br>
<div>

<?php
if(isset($_POST["submit1"]))

{
    $tm=md5 (time());
    $image=$_FILES["item_image"]["name"];
    $dst="./image/".$tm.$image;
    $dst1="image/".$tm.$image;

    if(file_exists($_FILES["item_image"]["temp_name"]) || is_uploaded_file($_FILES["item_image"]["temp_name"])){
        move_uploaded_file($_FILES["item_image"]["tmp_name"],$dst);
        mysqli_query($link,"UPDATE `item` SET `item_id`='$_POST[item_id]',`item_name`='$_POST[item_name]',`category`='$_POST[category]',`description`='$_POST[description]',`price`='$_POST[price]',`re_order_qty`='$_POST[re_order_qty]',`item_image`='$dst1' ,`brand`='$_POST[brand]' WHERE id=$id") or die(mysqli_error($link));  
    
    }
    mysqli_query($link,"UPDATE `item` SET `item_id`='$_POST[item_id]',`item_name`='$_POST[item_name]',`category`='$_POST[category]',
    `description`='$_POST[description]',`price`='$_POST[price]',`re_order_qty`='$_POST[re_order_qty]',`brand`='$_POST[brand]' WHERE id=$id") or die(mysqli_error($link));  
    ?>
    <script type="text/javascript"> 
        document.getElementById("success").style.display="block";
        setTimeout(function(){
          window.location="store.php";
        },800);       
    </script>
    <?php
}

if(isset($_POST["submit2"])){
  
}

?>
  


<?php  
include('includes/footer.php');

?>
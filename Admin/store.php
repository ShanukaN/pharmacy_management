<?php 
session_start(); 

if(isset($_SESSION['username']))
{

}
else{
    header("location:index.php");
}
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('database/connection.php');?>
</br></br>

<?php
  $sql = "SELECT * FROM `item` order by id desc limit 1";
  $res = mysqli_query($link, $sql);
  $row = mysqli_fetch_array($res);

$lastid = $row['item_id'];
if($lastid == " ")
{
  $itemId = "PH-1";
}else
{
  $itemId = substr($lastid,3);
  $itemId = intval($itemId);
  $itemId = "PH-".($itemId + 1);
}

?>




<!--Form--> 
<div class="s">
  <div class="container" >
    <div class="ai">
      <h2>Drug Register</h2>
    </div>
    <form class="n" action="" method="POST" enctype="multipart/form-data">  
                    <div class="modal-body">           
                        <div class="form-group row">
                            <label for="itemid" class="col-sm-2 col-form-label">Item ID</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control"   name="item_id" value="<?php echo $itemId; ?>" readonly>
                                </div>
                        </div>
                        <div class="form-group row">
                            <label for="itemname" class="col-sm-2 col-form-label">Item Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"   name="item_name"required>
                            </div>
                        </div>

                        <div class="form-group row">
                        <label for="category" class="col-sm-2 col-form-label" required>Category</label>
                        <div class="col-sm-10">
                         
                            <select id="cat" name="category">
                              <?php
                              $resul=mysqli_query($link,"SELECT cat_name FROM `category`");  
                                while($rows = $resul->fetch_assoc())
                                {
                                  $cat = $rows['cat_name'];
                                  echo "<option value = '$cat'>$cat</option> ";
                                }
                              ?>
                            </select>
                        </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                            <input type="text"  class="form-control"  name="description" required> 
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Price (Rs.)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"   name="price" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Re order Quantity</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"   name="re_order_qty" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Brand</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control"   name="brand" required>
                            </div>
                        </div>
                        <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Item Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" id="item_image"  name="item_image" >  
                            </div>
                        </div>
                        <div class="alert alert-danger" id="error" style="display:none" >
                            This Supplier Id Already Exist!
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

<!--Table--> 
<div class="widget-content nopadding">
    <table id="dataTable" class="table table-bordered table-dark table-hover">
        <thead class="table-success">
            <tr>
                  <th>ID</th>
                  <th>Item ID</th>
                  <th>Item Name</th>
                  <th>Category</th>
                  <th>Description</th>
                  <th>Price</th>
                  <th>Brand</th>
                  <th>Item Image</th>
                  <th>Quantity</th>
                  <th>Edit</th>
                  <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
                  $res=mysqli_query($link,"SELECT * FROM `item`");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                      <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["item_id"]; ?></td>
                        <td><?php echo $row["item_name"]; ?></td>
                        <td><?php echo $row["category"]; ?></td>
                        <td><?php echo $row["description"]; ?></td>
                        <td><?php echo $row["price"]; ?></td>
                        <td><?php echo $row["brand"]; ?></td>
                        <td> <img src="<?php echo $row["item_image"]; ?>" width="100px;" heigth="100px;" alt="image"></td>
                        <td><?php echo $row["qty"]; ?></td>
                        <td><a href="edit_store.php?id=<?php echo $row["id"]; ?>" class="btn btn-success ">Edit</a></td>
                        <td> 
                          <input type="hidden" class="delete_id_value" value="<?php echo $row["id"]; ?>">
                          <a href="javascripit:void(0)" class="delete_btn_ajax btn btn-danger">Delete</a>
                        </td>                        
                      </tr>
                    <?php
                  }
            ?>
        </tbody>
    </table>
</div>  


<!--#########    Insert   ###############-->
<?php
  if(isset($_POST["submit1"]))
  {
    $count=0;
    $res=mysqli_query($link,"SELECT * FROM `item` WHERE item_id='$_POST[item_id]'");
    $count=mysqli_num_rows($res);

    if($count>0)
    {
      ?>
      <script type="text/javascript"> 
          document.getElementById("success").style.display="none";
          document.getElementById("error").style.display="block";
      </script>
      <?php
    }
    else{
        $tm=md5 (time());
        $image=$_FILES["item_image"]["name"];
        $dst="./image/".$tm.$image;
        $dst1="image/".$tm.$image;

        move_uploaded_file($_FILES["item_image"]["tmp_name"],$dst);
        mysqli_query($link,"INSERT INTO `item` VALUES ('','$_POST[item_id]' ,'$_POST[item_name]' ,'$_POST[category]' ,'$_POST[description]' ,'$_POST[price]','$dst' ,'','$_POST[re_order_qty]','$_POST[brand]')");

      ?>
      <script type="text/javascript"> 
          document.getElementById("error").style.display="none";
          document.getElementById("success").style.display="block";
          setTimeout(function(){
            window.location.href= window.location.href;
          },1000);       
      </script>
      <?php
    }
  }
?>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>


  <!--Delete script-->
<script>
  $(document).ready(function() {

    $('.delete_btn_ajax').click(function(e){
      e.preventDefault();
      var deleteid=$(this).closest("tr").find('.delete_id_value').val();
      //console.log(deleteid);


      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover this data!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            
            $.ajax({
                  type: "POST",
                  url: "",
                  data: {
                    "delete_btn_set": 1,
                    "delete_id": deleteid,
                  },
                  
                  success: function(response){
                  
                    swal("Supplier Delete Successfully.!",{
                      icon: "success",
                    }).then((result) => {
                      location.reload();
                    });
                    }
                });
          } 
        });
    });
  
  });
</script>
  <!--Delete code--#########>

<?php
  $link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
  $db=mysqli_select_db($link,"shanuka") or die(mysqli_error($link));

  if(isset($_POST['delete_btn_set']))

  {
      $del_id = $_POST['delete_id'];

      $reg_query = "DELETE FROM `item` WHERE id='$del_id'";
      $reg_query_run = mysqli_query($link, $reg_query);
  }
?>



<?php  
include('includes/footer.php');

?>
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
<?php include('database/connection.php'); 


?>
</br></br>

<div class="s">
  <div class="container" >
    <div class="ai">
      <h2>Add Category</h2>
    </div>
    <form class="m" action="" method="POST" name="form1">
    <input type="hidden"  id="id"  name="id">
        <div class="form-group row">
        </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Category Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="category"  name="category" style="width:400px">
        </div>
      </div>
      <div class="alert alert-danger" id="error" style="display:none" >
                This Category Already Exist!
      </div>
      <div class="alert alert-danger" id="capital" style="display:none" >
                The first word is to use capital.
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-primary" name="submit1"  id="submit">Add</button>
      </div>
    
      <div class="alert alert-success" id="success" style="display:none" >
                Category Added Successfully!
      </div>
        
    </form>

  </div>

<br>

<!--Table--> 
<div class="widget-content nopadding center">
            <table id="dataTable" class="table table-striped table-dark" style="">
              <thead class="table-dark">
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Action</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody  >
                <?php
                  $res=mysqli_query($link,"SELECT * FROM `category`");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                      <tr>
                        <td  style="width:100px"><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["cat_name"]; ?></td>
                        
                        <td style="width:50px"><a href="edit_category.php?id=<?php echo $row["id"]; ?>" class="btn btn-success ">Edit</a></td>
                        <td  style="width:50px"> 
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

<!--########################################  Start Insert code  ########################################-->

  <?php

  
  $name = "/^[A-Z][a-zA-Z ]+$/";

  if(isset($_POST["submit1"]))
  {
    $catname = $_POST["category"];
    $count=0;
    $res=mysqli_query($link,"SELECT * FROM `category` WHERE cat_name='$catname'");
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
      mysqli_query($link,"INSERT INTO `category` VALUES (NULL,'$catname')")

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
<!--########################################  End Insert code  ########################################-->

<script>
  $(document).ready(function() {

    $('.delete_btn_ajax').click(function(e){
      e.preventDefault();
      var deleteid=$(this).closest("tr").find('.delete_id_value').val();
     


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
                  
                    swal("Category Delete Successfully.!",{
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
 

 <?php
  $link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
  $db=mysqli_select_db($link,"shanuka") or die(mysqli_error($link));

  if(isset($_POST['delete_btn_set']))

  {
      $del_id = $_POST['delete_id'];

      $reg_query = "DELETE FROM `category` WHERE id='$del_id'";
      $reg_query_run = mysqli_query($link, $reg_query);
  }
?>



<?php  
include('includes/footer.php');

?>
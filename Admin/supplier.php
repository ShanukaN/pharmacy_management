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


<?php
$sql = "SELECT * FROM `supplier` order by id desc limit 1";
$res = mysqli_query($link, $sql);
 $row = mysqli_fetch_array($res);

$lastid = $row['supid'];
if($lastid == " ")
{
  $supId = "SUP-1";
}else
{
  $supId = substr($lastid,4);
  $supId = intval($supId);
  $supId = "SUP-".($supId + 1);
}

?>


</br></br>
<!--Form--> 
<div class="s">
  <div class="container" >
    <div class="ai">
      <h2>Supplier Register</h2>
    </div>
    <form class="n" action="" method="POST" name="form1">
    <input type="hidden"  id="id"  name="id">
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Supplier ID</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="supid"  name="supid" value="<?php echo $supId; ?>" readonly>
        </div>
      </div>
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Full Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="sname"  name="supname">
        </div>
      </div>   
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Address</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="address"  name="address">
        </div>
      </div>
    
      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Contact No</label>
          <div class="col-sm-10">
            <input type="number" 
                   onkeypress="return onlyNumberKey(event)" 
                   maxlength="11" class="form-control" id="ctno"  name="contact">
          
          </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">Company</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="company"  name="company">
          
        </div>
      </div>
<!--########  Error MS ########-->
          <div class="alert alert-danger" id="error" style="display:none" >
                This Supplier Id Already Exist!
          </div>
          <div class="alert alert-danger" id="empty" style="display:none" >
                Please fill all the fields!.
          </div>
          <div class="alert alert-danger" id="tel1" style="display:none" >
                Mobile number is not valid.
          </div>
          <div class="alert alert-danger" id="tel2" style="display:none" >
                Mobile number must be 10 digit.
          </div>
<!--########  Error MS ########-->

      <div class="text-center">
        <button type="submit" class="btn btn-primary" name="submit1"  id="submit">Submit</button>
      </div>

<!--########  Error MS ########-->    
      <div class="alert alert-success" id="success" style="display:none" >
                Supplier Added Successfully!
          </div>
<!--########  Error MS ########-->
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
                  <th>Supplier ID</th>
                  <th>Supplier Name</th>
                  <th>Address</th>
                  <th>Contact No</th>
                  <th>Company</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $res=mysqli_query($link,"SELECT * FROM `supplier`");
                  while($row=mysqli_fetch_array($res))
                  {
                    ?>
                      <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["supid"]; ?></td>
                        <td><?php echo $row["supname"]; ?></td>
                        <td><?php echo $row["address"]; ?></td>
                        <td><?php echo $row["contact"]; ?></td>
                        <td><?php echo $row["company"]; ?></td>
                        
                        <td><a href="edit_supplier.php?id=<?php echo $row["id"]; ?>" class="btn btn-success ">Edit</a></td>
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

    $supid = $_POST["supid"];
    $supname = $_POST["supname"];
    $supaddress = $_POST["address"];
    $supcontact = $_POST["contact"];
    $supcompany = $_POST["company"];
    $number = "/^[0-9]+$/";

    $count=0;
    $res=mysqli_query($link,"SELECT * FROM `supplier` WHERE supid='$_POST[supid]'");
    $count=mysqli_num_rows($res);

    if($count>0)
    {
      ?>
      <script type="text/javascript"> 
          document.getElementById("success").style.display="none";
          document.getElementById("error").style.display="block";
          setTimeout(function(){
            window.location.href= window.location.href;
          },2300);
      </script>
      <?php
    }else{
    if(empty($supid) || empty($supname) || empty($supaddress) || empty($supcontact) || empty($supcompany)){

      ?>
      <script type="text/javascript"> 
          document.getElementById("success").style.display="none";
          document.getElementById("empty").style.display="block";
          setTimeout(function(){
            window.location.href= window.location.href;
          },2300);
      </script>
      <?php
        exit();
    }    
    if(!preg_match($number,$supcontact)){
      ?>
      ?>
      <script type="text/javascript"> 
          document.getElementById("success").style.display="none";
          document.getElementById("tel1").style.display="block";
          setTimeout(function(){
            window.location.href= window.location.href;
          },2300);
      </script>
      <?php
        exit();
    }
    if(!(strlen($supcontact) == 10)){
      ?>
      <script type="text/javascript"> 
          document.getElementById("success").style.display="none";
          document.getElementById("tel2").style.display="block";
          setTimeout(function(){
            window.location.href= window.location.href;
          },2300);
      </script>
      <?php
        exit();
    }
    
      mysqli_query($link,"INSERT INTO `supplier` VALUES (NULL,'$_POST[supid]' ,'$_POST[supname]' ,'$_POST[address]' ,'$_POST[contact]' ,'$_POST[company]' )")

      ?>
      <script type="text/javascript"> 
          document.getElementById("error").style.display="none";
          document.getElementById("success").style.display="block";
          setTimeout(function(){
            window.location.href= window.location.href;
          },2000);       
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

      $reg_query = "DELETE FROM `supplier` WHERE id='$del_id'";
      $reg_query_run = mysqli_query($link, $reg_query);
  }
?>




<?php  
include('includes/footer.php');

?>
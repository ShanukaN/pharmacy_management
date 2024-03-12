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
<div class="table"></br>
    <div class="">
        <h2><center>Online Priscription</center></h2>
    </div></br>
    <div class="widget-content nopadding">
        <table id="dataTable" class="table table-dark  table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $res=mysqli_query($link,"SELECT * FROM `pris` WHERE `status`= 'pending'");
                    while($row=mysqli_fetch_array($res))
                    {
                        ?>
                <tr>
                    <td class="item_id"><?php echo $row["id"]; ?></td>
                    <td><?php echo $row["cus_id"]; ?></td>
                    <td><?php echo $row["cus_name"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td> <img src="../Admin/<?php echo $row["image"]; ?>" style="  width: 50px; height: 50px;" alt="image"></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td style=""><?php echo $row["status"]; ?></td>
                    <td><a type="button" class="btn btn-primary" href="priscription_code.php?id=<?php echo $row["id"]; ?> ">Process</a></td>
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="table"></br>
    <div class="">
        <h2><center>Dilivery</center></h2>
    </div></br>
    <div class="widget-content nopadding">
        <form action="" method="POST">
        <table id="dataTable1" class="table table-dark  table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Customer Id</th>
                    <th>Customer Name</th>
                    <th>Address</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Status</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $res=mysqli_query($link,"SELECT * FROM `pris` WHERE `status`= 'delivered'");
                    while($row=mysqli_fetch_array($res))
                    {$id = $row["cus_id"];
                        ?>
                <tr>
                    <td class="item_id"><?php echo $row["id"]; ?></td>
                    <td><?php echo $id ?></td>
                    <td><?php echo $row["cus_name"]; ?></td>
                    <td><?php echo $row["address"]; ?></td>
                    <td> <img src="../Admin/<?php echo $row["image"]; ?>" style="  width: 50px; height: 50px;" alt="image"></td>
                    <td><?php echo $row["date"]; ?></td>
                    <td style="" value="<?php echo $row["status"]; ?>">Delivering</td>
                    
                    <td><button type="submit" class="btn btn-success" id="submit1" name="submit1">done</button></td>
                    
                    </td>
                </tr>
                <?php
                                        if(isset($_POST["submit1"])){

                        
                                            mysqli_query($link,"UPDATE `pris` SET status='done' WHERE cus_id=$id") or die(mysqli_error($link));
                                            ?>
                                            <script type="text/javascript"> 
                                                setTimeout(function(){
                                                    window.location.href= window.location.href;
                                                    },1000);       
      </script>
                                            <?php
                                         }
                        }
                ?>
            </tbody>
        </table>
        </form>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>

<script>
$(document).ready(function() {
    $('#dataTable').DataTable();
});
</script>

<script>
$(document).ready(function() {
    $('#dataTable1').DataTable();
});
</script>



<?php

?>


</body>
</html>
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
<div class="table1"></br>
    <div class="outstock">
        <h2>Out of Stock</h2>
    </div></br>
    <div class="widget-content nopadding">
        <table id="dataTable" class="table table-dark  table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Available Quantity</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $res=mysqli_query($link,"SELECT * FROM `item` WHERE qty<=re_order_qty");
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
                    <td><?php echo $row["qty"]; ?></td>

                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>
</br></br></br></br></br>

<div class="table1"></br>
    <div class="instock">
        <h2>In Stock</h2>
    </div></br>
    <div class="widget-content nopadding">
        <table id="dataTable1" class="table table-dark  table-hover">
            <thead class="table-success">
                <tr>
                    <th>ID</th>
                    <th>Item ID</th>
                    <th>Item Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Available Quantity</th>

                </tr>
            </thead>
            <tbody>
                <?php
                    $res=mysqli_query($link,"SELECT * FROM `item` WHERE qty>re_order_qty");
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
                    <td><?php echo $row["qty"]; ?></td>

                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
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
include('includes/footer.php');

?>
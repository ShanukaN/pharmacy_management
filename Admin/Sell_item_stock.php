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
<?php include('includes/navbar.php');?>
<?php include('database/connection.php');?>

</br></br>
<div class="s">
    <div class="container" >
        <div class="ai">
            <h2>View Sell Item Stock</h2>
        </div>
       
    </div>
</div>
<div class="table1">
    <div class="widget-content nopadding">
            <table id="dataTable" class="table table-bordered table-dark table-hover" >
                <thead class="table-success">
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Item Name</th>
                        <th>Sub Total</th>
                        <th>Discount</th>
                        <th>Net Total</th>
                        <th>paid</th>
                        <th>Due</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $res=mysqli_query($link,"SELECT invoice.invoice_no,invoice.customer_name,invoice_details.item_name,invoice.sub_total,invoice.discount,invoice.net_total,invoice.paid,invoice.due,invoice.order_date FROM invoice INNER JOIN invoice_details ON invoice.invoice_no=invoice_details.invoice_no");
                    while($row=mysqli_fetch_array($res))
                    {
                        ?>
                        <tr>
                                <td><?php echo $row["invoice_no"]; ?></td>
                                <td><?php echo $row["customer_name"]; ?></td>
                                <td><?php echo $row["item_name"]; ?></td>
                                <td><?php echo $row["sub_total"]; ?></td>
                                <td><?php echo $row["discount"]; ?></td>
                                <td><?php echo $row["net_total"]; ?></td>
                                <td><?php echo $row["paid"]; ?></td>
                                <td><?php echo $row["due"]; ?></td>
                                <td><?php echo $row["order_date"]; ?></td>
                                                      
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
    </div>  
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="js/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script type="text/javascript"></script>

<script>
  $(document).ready(function() {
    $('#dataTable').DataTable();
} );
</script>



<?php  
include('includes/footer.php');

?>
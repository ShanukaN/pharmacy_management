<?php 
session_start(); 

if(isset($_SESSION['username']))
{

}
else
{
    header("location:index.php");
}
?>

<?php include('includes/header.php'); ?>
<?php include('includes/navbar.php'); ?>
<?php include('database/connection.php');?>

</br></br>
<div class="s">
    <div class="container">
        <div class="ai">
            <h2>Buy Item</h2>
        </div>
    </div>

    <form class="t" action="" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="form-group row">
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Item Id</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="item_id" name="item_id"
                                    onkeyup="GetDetail2(this.value)">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Supplier Id</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="supid" name="supid"
                                    onkeyup="GetDetail1(this.value)">
                            </div>

                        </div>
                    </div>
                    <br>
                </div>

                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">item Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="item_name" name="item_name" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Supplier Name</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="supname" name="supname" readonly>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Price</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="price" name="price" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-4 col-form-label">Expire Date</label>
                            <div class="col-sm-5">
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Quantity</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="qty" name="qty">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputEmail3" class="col-sm-3 col-form-label">Total Price</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="alert alert-success" id="success" style="display:none">
                    Item Added.
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary" name="submit" id="submit">Submit</button>
                </div>
                <div class="alert alert-danger" id="empty" style="display:none">
                    Please fill all the fields!.
                </div>
            </div>
        </div>
    </form>
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

<script src="js/bootstrap.js"></script>
<script src="js/jquery-3.2.1.min.js"></script>
<script stype="text/javascript"></script>

<script>
function GetDetail1(str) {
    if (str.length == 0) {
        document.getElementById("supname").value = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                document.getElementById("supname").value = myObj[0];

            }
        };
        xmlhttp.open("GET", "buy_code1.php?supid=" + str, true);
        xmlhttp.send();
    }
}
</script>


<script>
function GetDetail2(str) {
    if (str.length == 0) {
        document.getElementById("item_name").value = "";
        document.getElementById("price").value = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var myObj = JSON.parse(this.responseText);
                document.getElementById("item_name").value = myObj[0];
                document.getElementById("price").value = myObj[1];
            }
        };
        xmlhttp.open("GET", "buy_code.php?item_id=" + str, true);
        xmlhttp.send();
    }
}
</script>

<script>
$(document).ready(function() {
    // Get value on keyup funtion
    $("#price, #qty").keyup(function() {

        var total = 0;
        var x = Number($("#price").val());
        var y = Number($("#qty").val());
        var total = x * y;

        $('#total_price').val(total);

    });
});
</script>

<?php
$link=mysqli_connect("localhost","root","") or die(mysqli_error($link));
mysqli_select_db($link,"shanuka") or die(mysqli_error($link));
  if(isset($_POST["submit"]))
  {
    $itemid = $_POST["item_id"];
    $itemname = $_POST["item_name"];
    $supid = $_POST["supid"];
    $supname = $_POST["supname"];
    $price = $_POST["price"];
    $totalprice = $_POST["total_price"];
    $qty = $_POST["qty"];
    $date = $_POST["date"];

    if(empty($itemid) || empty($itemname) || empty($supid) || empty($supname) || empty($price) || empty($totalprice) || empty($qty) || empty($date)){

        ?>
<script type="text/javascript">
document.getElementById("success").style.display = "none";
document.getElementById("empty").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 2300);
</script>
<?php
          exit();
      }else{    
    mysqli_query($link,"INSERT INTO `buy_item` VALUES (NULL,'$_POST[item_id]' ,'$_POST[item_name]' ,'$_POST[supid]','$_POST[supname]','$_POST[price]','$_POST[qty]','$_POST[total_price]','$_POST[date]',NULL)");

    mysqli_query($link,"UPDATE `item` SET qty = qty+'$_POST[qty]' WHERE item_id='$_POST[item_id]'") or die(mysqli_error($link));

    ?>
<script type="text/javascript">
document.getElementById("error").style.display = "none";
document.getElementById("success").style.display = "block";
setTimeout(function() {
    window.location.href = window.location.href;
}, 1000);
</script>
<?php

      }
  }

?>

<?php  
include('includes/footer.php');

?>
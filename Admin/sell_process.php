<?php
  include_once("database/constants.php");
  include('includes/DBOperation.php');
  include('includes/manage.php');

  if(isset($_POST["getNewOrderItem"])){
    $obj = new DBOperation();
    $rows =$obj->getAllRecord("item");
    ?>
<tr>
    <td><b class="number">1</b></td>
    <td>
        <select name="id[]" class="form-control form-control-sm id" required>
            <option value="">Choose Item</option>
            <?php
                        foreach($rows as $row){
                            ?> <option value="<?php echo $row['id']; ?>"><?php echo $row["item_name"]; ?></option> <?php
                        }
                    ?>
        </select>
    </td>
    <td><input name="tqty[]" readonly type="text" class="form-control form-control-sm tqty"></td>
    <td><input name="qty[]" type="text" class="form-control form-control-sm qty" required></td>
    <td><input name="price[]" type="text" class="form-control form-control-sm price" readonly></span>
        <span><input name="item_name[]" type="hidden" class="form-control form-control-sm item_name">
    </td>
    <td>Rs.<span class="amt">0</span></td>
</tr>
<?php
    exit();

  }

  //get price and qty of one item
  if (isset($_POST["getPriceAndQty"])) {
    $m = new Manage();
    $result = $m->getSingleRecord("item","id",$_POST["id"]);
    echo json_encode($result);
    exit();
  }

  if(isset($_POST["order_date"]) AND isset($_POST["cust_name"])){
    $orderdate = $_POST["order_date"];
    $cust_name = $_POST["cust_name"];

    //getting array from order_form

    $ar_tqty = $_POST["tqty"];
    $ar_qty = $_POST["qty"];
    $ar_price = $_POST["price"];
    $ar_item_name = $_POST["item_name"];

    $sub_total = $_POST["sub_total"];
    $discount = $_POST["discount"];
    $net_total = $_POST["net_total"];
    $paid = $_POST["paid"];
    $due = $_POST["due"];
    $payment_type = $_POST["payment_type"];

    $m = new Manage();
    echo $result = $m->storeCustomerOrderInvoice($orderdate,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_item_name,$sub_total,$discount,$net_total,$paid,$due,$payment_type);


  }

?>
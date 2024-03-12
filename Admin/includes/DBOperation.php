<?php

/**
* 
*/
class DBOperation
{
	private $con;

	function __construct()
	{
		include_once("database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}
	 function getAllRecord($table){
		$pre_stmt = $this->con->prepare("SELECT * FROM ".$table);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		$rows = array();
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				$rows[] = $row;
			}
			return $rows;
		}
		return "NO_DATA";
	}
}
?>

<?php

class Manage
{
	private $con;

	function __construct()
	{
		include_once("database/db.php");
		$db = new Database();
		$this->con = $db->connect();
	}

	public function getSingleRecord($table,$pk,$id){
		$pre_stmt = $this->con->prepare("SELECT * FROM ".$table." WHERE ".$pk."= ? LIMIT 1");
		$pre_stmt->bind_param("i",$id);
		$pre_stmt->execute() or die($this->con->error);
		$result = $pre_stmt->get_result();
		if ($result->num_rows == 1) {
			$row = $result->fetch_assoc();
		}
		return $row;
	}

	public function storeCustomerOrderInvoice($orderdate,$cust_name,$ar_tqty,$ar_qty,$ar_price,$ar_item_name,$sub_total,$discount,$net_total,$paid,$due,$payment_type)
	{
		$pre_stmt = $this->con->prepare("INSERT INTO `invoice`( `customer_name`, `order_date`, `sub_total`, `discount`, `net_total`, `paid`, `due`, `payment_type`) VALUES (?,?,?,?,?,?,?,?)");
		$pre_stmt->bind_param("ssddddds",$cust_name,$orderdate,$sub_total,$discount,$net_total,$paid,$due,$payment_type);
		$pre_stmt->execute() or die($this->con->error);
		$invoice_no = $pre_stmt ->insert_id;

		if ($invoice_no != null) {
			for ($i=0; $i < count($ar_price) ; $i++) {

				$rem_qty = $ar_tqty[$i] - $ar_qty[$i];
				if($rem_qty < 0){
					return "Order Fail to Complete";
				}else{
					//Update Item Quantity
					$sql = "UPDATE item SET qty='$rem_qty' WHERE  item_name='".$ar_item_name[$i]."'";
					$this->con->query($sql); 
				}

				$insert_product = $this->con->prepare("INSERT INTO `invoice_details`(`invoice_no`, `item_name`, `price`, `qty`) VALUES (?,?,?,?)");
				$insert_product->bind_param("isdd",$invoice_no,$ar_item_name[$i],$ar_price[$i],$ar_qty[$i]);
				$insert_product->execute() or die($this->con->error);
			}
			
			return $invoice_no;

		}
		
	}

}

?>

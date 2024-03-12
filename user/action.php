<?php
session_start();
include('db.php');
if(isset($_POST["category"])){
    $category_query = "SELECT * FROM category";
    $run_query = mysqli_query($con,$category_query);
    echo "
    <div class='nav nav-pills nav-stacked'>
        <li class='active'><a href='' text-align='center'>Categories</a></li>
    ";

    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $cid = $row["id"];
            $cat_name = $row["cat_name"];
            echo "
            <li><a href='' class='category' cname='$cat_name'>$cat_name</a></li>
            ";
        }
        echo "</div>";
    }
}

if(isset($_POST["page"])){
    $sql = "SELECT * FROM item";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    $pageno = ceil($count/9);
    for($i=1;$i<=$pageno;$i++){
        echo "
        <li><a href='' page ='$i' id='page'>$i</a></li>
        ";
    }

}


if(isset($_POST['getProduct'])){
    $limit = 9;
    if(isset($_POST["setpage"])){
        $pageno = $_POST["pageNumber"];
        $start = ($pageno * $limit) - $limit;
    }else{
        $start = 0;
    }
    $product_query = "SELECT * FROM item WHERE qty>re_order_qty LIMIT $start,$limit";
    $run_query = mysqli_query($con,$product_query);
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $pro_id = $row['id'];
            $pro_price = $row['price'];
            $pro_des = $row['description'];
            $pro_image = $row['item_image'];
            $pro_name = $row['item_name'];
            echo "
                <div class='col-md-4'>
                    <div class='panel panel-info'>
                        <div class='panel-heading'>$pro_name</div>
                            <div class='panel-body'>
                                 <center><img src='/nade/Admin/$pro_image' style='width:160px; height:160px;'></center>
                            </div>
                            <div class='panel-heading'>Rs.$pro_price.00
                                <a pid='$pro_id' style='float:right;' id='product' class='btn btn-success btn-xs'>Add to cart</a>
                                <button pid='$pro_id' style='float:right;' id='view' class='btn btn-success btn-xs'>View</button>
                            </div>
                    </div>
                </div>
            ";

        }
    }
}



if(isset($_POST["viewproduct"])){
    $p_id=$_POST["proId"];
    $product_query = "SELECT * FROM item WHERE id='$p_id'";
    $run_query = mysqli_query($con,$product_query);
    if(mysqli_num_rows($run_query) > 0){
        while($row = mysqli_fetch_array($run_query)){
            $pro_id = $row['id'];
            $pro_price = $row['price'];
            $pro_des = $row['description'];
            $pro_image = $row['item_image'];
            $pro_name = $row['item_name'];
            echo "
            <div class='col-md-12'>
                <div class='panel panel-info'>
                    <div class='panel-heading' style='font-size: 20px;'><center><b>$pro_name</b></center></div>
                        <div class='panel-body'>
                            <div class='col-md-6'>
                                <center><img src='/nade/Admin/$pro_image' style='width:160px; height:160px;'></center>
                            </div>
                            <div class='col-md-6'>
                                <div class='panel-body'>
                                <div style='font-size: 15px;'>    
                                <center>$pro_des</center>
                                </div><br>
                                <div><center style='font-size: 15px;'>Rs.$pro_price.00</center></div><br>
                                <div style='align-items: center;'>
                                <center><a pid='$pro_id'  id='product' class='btn btn-success btn-xs' >Add to cart</a></center>
                                <center><a id='back' class='btn btn-success btn-xs' href='profile.php'>Back</a></center>
                                    </div>
                            </div>
                        </div>
                </div>
            </div>
        ";

        }
    }
}







if(isset($_POST["get_selected_category"]) || isset($_POST["search"])){
    if(isset($_POST["get_selected_category"])){
        $cname = $_POST["cat_name"];
        $sql = "SELECT * FROM item WHERE category='$cname'";
    
    }else if(isset($_POST["search"])){
        $keyword = $_POST["item_name"];
        $sql = "SELECT * FROM item WHERE item_name='$keyword'";
    
    }else{
        echo "No Fount Product!";
    }
    $run_query = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($run_query)){
        $pro_id = $row['id'];
        $pro_price = $row['price'];
        $pro_des = $row['description'];
        $pro_image = $row['item_image'];
        $pro_name = $row['item_name'];
        echo "
        <div class='col-md-4'>
        <div class='panel panel-info'>
            <div class='panel-heading'>$pro_name</div>
                <div class='panel-body'>
                     <center><img src='/nade/Admin/$pro_image' style='width:160px; height:160px;'></center>
                </div>
                <div class='panel-heading'>Rs.$pro_price.00
                    <a pid='$pro_id' style='float:right;' id='product' class='btn btn-success btn-xs'>Add to cart</a>
                    <button pid='$pro_id' style='float:right;' id='view' class='btn btn-success btn-xs'>View</button>
                </div>
        </div>
        </div>
        ";
    }
}

if(isset($_POST["addProduct"])){
    $p_id = $_POST["proId"];
    $user_id = $_SESSION["uid"];
    $sql = "SELECT * FROM `cart` WHERE `p_id`='$p_id' AND `user_id`='$user_id'";
    $run_query = mysqli_query($con,$sql);
    $count = mysqli_num_rows($run_query);
    if($count > 0){
        echo "
            <div class='alert alert-danger'>
                 <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
                <b>Product is already added into Cart.</b>
            </div>";
    }else{
        $sql = "SELECT * FROM item WHERE id='$p_id'";
        $run_query = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($run_query);
            $id = $row["id"];
            $pro_name = $row["item_name"];
            $pro_image = $row["item_image"];
            $pro_price = $row["price"];

        $sql = "INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `product_name`, `product_image`, `qty`, `price`, `total_amt`, `state`)
         VALUES (NULL, '$p_id', '0', '$user_id', '$pro_name', '$pro_image', '1', '$pro_price', '$pro_price','pending');";
         
         if(mysqli_query($con,$sql)){
             echo "
                <div class='alert alert-success'>
                    <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
                    <b>Product is Added.</b>
                </div>
                ";
                exit();
         }
    }
}

if(isset($_POST["get_cart_product"]) || isset($_POST["cart_checkout"])){
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id='$uid' AND state='pending'";
    $run_query = mysqli_query($con,$sql);
    $count =mysqli_num_rows($run_query);
    if($count > 0){
        $no =1;
        $total_amt = 0;
        while($row = mysqli_fetch_array($run_query)){
            $id = $row["id"];
            $pro_id =$row["p_id"];
            $pro_name =$row["product_name"];
            $pro_image =$row["product_image"];
            $qty =$row["qty"];
            $pro_price =$row["price"];
            $total = $row["total_amt"];
            $price_array = $row["total_amt"];
            $total_array = array($total);
            $total_sum = array_sum($total_array);
            $total_amt = $total_amt + $total_sum;

            if(isset($_POST["get_cart_product"])){
                echo"
                <div class='row'>
                    <div class='col-md-3'>$no</div>
                    <div class='col-md-3'><img src='/nade/Admin/$pro_image' width='60px' height='50px'></div>
                    <div class='col-md-3'>$pro_name</div>
                    <div class='col-md-3'>Rs.$pro_price.00</div>
                </div></br>
            ";
            $no = $no+1;
            }else{
                echo"
                    <div class='row'>
                        <div class='col-md-2'>
                            <div class='btn-gropu'>
                            <a href='#' remove_id='$pro_id' class='btn btn-danger remove'><span class='glyphicon glyphicon-trash'></span></a>
                            <a href='#' update_id='$pro_id' class='btn btn-primary update'><span class='glyphicon glyphicon-ok-sign'></span></a>
                            </div>
                        </div>
                        <div class='col-md-2'><img src='/nade/Admin/$pro_image' width='60px' height='60px'></div>
                        <div class='col-md-2'>$pro_name</div>
                        <div class='col-md-2'><input type='text' class='form-control qty' pid='$pro_id' id='qty-$pro_id' value='$qty'></div>
                        <div class='col-md-2'><input type='text' class='form-control price' pid='$pro_id' id='price-$pro_id' value='$pro_price' disabled></div>
                        <div class='col-md-2'><input type='text' class='form-control total' pid='$pro_id' id='total-$pro_id' value='$total' disabled></div>
                    </div>
                ";
            }
            
        }
        if(isset($_POST["cart_checkout"])){
            echo"
            <div class='row'>
            <div class='col-md-8'></div>
            <div class='col-md-4'>
                <b>Total Price &nbsp;&nbsp;  Rs.$total_amt</b>
            </div>
            </div>
            <div class='row'>
                <center>
            <a href='payment.php' class='btn btn-danger'><span class='glyphicon glyphicon-trash'></span></a>
                </center>
            </div>
        ";
        }

    }
}

if(isset($_POST["cart_count"])){
    $uid = $_SESSION["uid"];
    $sql = "SELECT * FROM cart WHERE user_id='$uid' AND state='pending'";
    $run_query = mysqli_query($con,$sql);
    echo mysqli_num_rows($run_query);

}


if(isset($_POST["removefromcart"])){
    $pid = $_POST["removeid"];
    $uid = $_SESSION["uid"];
    $sql = "DELETE FROM cart WHERE user_id='$uid' AND p_id = '$pid'";
    $run_query = mysqli_query($con,$sql);
    if($run_query){
        echo"
            <div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
            <b>Product is Removed.</b>
            </div>
        ";
    }

}

if(isset($_POST["updateproduct"])){
    $uid =$_SESSION["uid"];
    $pid = $_POST["updateID"];
    $qty = $_POST["qty"];
    $price = $_POST["price"];
    $total = $_POST["total"];

    $sql = "UPDATE cart SET qty = '$qty',price='$price',total_amt='$total' WHERE `user_id`='$uid' AND p_id = '$pid'";
    $run_query = mysqli_query($con,$sql);
    if($run_query){
        echo"
        <div class='alert alert-success'>
        <a href='#' class='close' data-dismiss='alert' arial-label='close'>&times;</a>
        <b>Product is Updated.</b>
        </div>
        ";
    }

}


?>
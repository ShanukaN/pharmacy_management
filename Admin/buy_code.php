<?php
    $id1=$_REQUEST['item_id'];
    $con=mysqli_connect("localhost","root","","shanuka");
    if($id1!=""){
        $query =mysqli_query($con,"SELECT * FROM `item` WHERE item_id='$id1'");
        $row =mysqli_fetch_array($query);
        $iname = $row["item_name"];
        $iprice = $row["price"];
    }
    $result = array("$iname","$iprice");
    $myJSON = json_encode($result);
    echo $myJSON;

?>



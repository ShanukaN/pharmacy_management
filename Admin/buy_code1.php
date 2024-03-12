<?php
    $id1=$_REQUEST['supid'];
    $con=mysqli_connect("localhost","root","","shanuka");
    if($id1!=""){
        $query =mysqli_query($con,"SELECT * FROM `supplier` WHERE supid='$id1'");
        $row=mysqli_fetch_array($query);
        $sname = $row["supname"];
        
    }
    $result = array("$sname");
    $myJSON = json_encode($result);
    echo $myJSON;

?>
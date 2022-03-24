<?php include('../config/config.php');?>
<?php

    $id=$_GET['id'];

    $sql="DELETE FROM oder WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        $_SESSION['decline']= "Your Oder have been cancelled";
        header('location:'.SITEURL.'admin/order.php');
    }
    else{
        $_SESSION['decline']= "Error in cancelling the appointment";
        header('location:'.SITEURL.'admin/order.php');
    }


?>
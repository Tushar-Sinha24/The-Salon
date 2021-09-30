<?php include('../config/config.php');?>
<?php

    $id=$_GET['id'];

    $sql="DELETE FROM admin WHERE id=$id";

    $res = mysqli_query($conn, $sql);

    if($res==TRUE){
        $_SESSION['delete']= "Admin deleted  Successfully";
        header('location:'.SITEURL.'admin/admin.php');
    }
    else{
        $_SESSION['delete']= "Admin deletion Failed... TRY AGAIN!";
        header('location:'.SITEURL.'admin/admin.php');
    }


?>
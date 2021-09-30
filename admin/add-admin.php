<?php include('partial/nav.php')?>
<main>
    <div class="container1">
        <h1>Add Admin</h1>
        
        <div class="container2">
        <form action="" method="POST" >
            <table class="add-admin">
                <tr>
                    <td><strong>Full Name</strong></td>
                    <td><input type="text" name="name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td><strong>User Name</strong></td>
                    <td><input type="text" name="user_name" placeholder="Enter Your Name"></td>
                </tr>
                <tr>
                    <td><strong>Password</strong></td>
                    <td><input type="password" name="password" placeholder="Enter Your Name"></td>
                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit"  name ="submit" value="Add" class="btn-sec" >
                    </td>
                </tr>
            </table>
        </form>
        </div>

    </div>

</main>

<?php include('partial/footer.php')?>


<?php

if(isset($_POST[ "submit" ])){

    //1
    $name = $_POST['name'];
    $user_name = $_POST['user_name'];
    $password = md5($_POST['password']);
    
    //2 sql query

    $sql="INSERT INTO admin SET
        full_name='$name',
        username = '$user_name',
        password= '$password'

    ";

   //3saving data
    $res = mysqli_query($conn, $sql) or die(mysqli_error());

    //4 query execution 

    if($res==TRUE)
    {
        // echo "inserted";
        $_SESSION['add'] = "Admin added successfully";

        header("location:".SITEURL.'admin/admin.php');
    }
    else{
        // echo "not inserted";
        $_SESSION['add'] = "FAILURE";

        header("location:".SITEURL.'admin/add-admin.php');
    }
}



?>
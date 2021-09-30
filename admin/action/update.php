<?php include('../config/config.php');?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   <link rel="stylesheet" href="../css/style.css"> 
   <title>UPDATE</title>
  </head>
  <body>
    

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a href="../admin.php" ><i class="fas fa-arrow-left">back</i></a>
    <a class="navbar-brand " href="#">UPDATE ADMIN</a>

    
  </div>
</nav>
<?php
            $id=$_GET['id'];
            $sql = "SELECT * from admin WHERE id=$id";

            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if($res==TRUE){

                $count= mysqli_num_rows($res);
                
                if($count==1){
                    $row=mysqli_fetch_assoc($res);
                    $name = $row['full_name'];
                    $username=$row['username'];
                    $password = $row['password'];
                }
                else{
                    header('location:'.SITEURL.'admin/admin.php');
                    }
                }


        ?>


<?php echo $password;?>
<?php echo $id ;?>





<!-- Modal -->
<div class="modal fade" id="password" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change your password</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
      <form action="" method="POST">
        
        <div class="mb-3">
            <label  class="form-label">Enter Your current password</label>
            <input type="password" name="current_pass" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">New password</label>
            <input type="password" name="new_pass" class="form-control" >
        </div>
        <div class="mb-3">
            <label  class="form-label">Confirm password</label>
            <input type="password" name="confirm_pass" class="form-control" >
        </div>
        <input type="text" name="id" value="<?php echo $id; ?>">
        <button type="button" name="save" class="btn btn-primary">Submit</button>
        </form>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<?php
    if(isset($_POST['save'])){
        $current_pass=$_POST['current_pass'];
        $new_pass=$_POST['new_pass'];
        $id=$_POST['id'];
        $confirm_pass=$_POST['confirm_pass'];

        if(($current_pass==$password)&&($new_pass==$confirm_pass)){
            $sql="UPDATE admin SET
                password='$new_pass'
                WHERE id='$id'
            ";
             $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
             if($res==TRUE){
                $_SESSION['change'] = "Successfully change password";
                header('location:'.SITEURL.'admin/admin.php');
             }
             else{
                $_SESSION['change'] = "Failed to change password";
                header('location:'.SITEURL.'admin/admin.php');
             }

        }
        else{
            $_SESSION['error'] = "Something Went wrong! Try again.";
            header('location:'.SITEURL.'admin/action/update.php');
        }

    }

?>













<main>
    <div class="container1">
        <h3>Upadte Your Information</h3>
        <br>
        <br>
        <!-- <?php
        if(isset($_SESSION['error'])){
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?> -->



        <form action="" method="POST">
            <div class="mb-3">
                <label  class="form-label">Name</label>
                <input type="text" name="name" value="<?php echo $name;?>" class="form-control" >
                
            </div>
            <div class="mb-3">
                <label  class="form-label">User Name</label>
                <input type="text" name="username" value="<?php echo $username;?>" class="form-control">
            </div>
            
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <button type="submit"name ="submit" class="btn btn-primary">Submit</button>
            <div class="form-text">Click on <strong>submit</strong> for update.</div>
        </form>
        <div class="change">
        
        <div class="add">
            <p>Edit your <strong>password</strong></p>
            <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#password">
            Change Password
        </button>

            </div>
        
    </div>

    </div>
    
</main>


    <?php 
        if(isset($_POST['submit'])){
            $id = $_POST['id'];
            $name = $_POST['name'];
            $username = $_POST['username'];


            $sql="UPDATE admin SET
                full_name='$name',
                username='$username'
                WHERE id='$id'
            ";

            $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));
            if($res==TRUE){
                $_SESSION['update'] = "Successfully Updateed";
                header('location:'.SITEURL.'admin/admin.php');
            }
            else{
                $_SESSION['update'] = "Failed to Updateed";
                header('location:'.SITEURL.'admin/admin.php');
                }
        }

        
    ?>

    


<?php include('../partial/footer.php')?>


    



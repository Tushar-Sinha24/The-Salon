<?php include('partial/nav.php')?>


<main>
    <div class="container1">
        <h1>Admin Manager</h1>

        <?php
            if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
                unset($_SESSION['delete']);
            }
            if(isset($_SESSION['update'])){
                echo $_SESSION['update'];
                unset($_SESSION['update']);
            }
        ?>

        <div class="add">
            <a href="add-admin.php" class="btn-pri">Add Admin</a>
            </div>

            <div class="admin-container">
            <table class="table table-hover">
                <tr>
                    <th class="table-heading">S.N.</th>
                    <th class="table-heading">Full Name</th>
                    <th class="table-heading">User Name</th>
                    <th class="table-heading">Action</th>
                </tr>
                <?php
                    $sql = "SELECT * from admin";

                    $res = mysqli_query($conn, $sql) or die(mysqli_error());
                    if($res==TRUE){

                        $count= mysqli_num_rows($res);
                        $sn=0;
                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res))
                            {

                                $id =$rows['id'];
                                $name = $rows['full_name'];
                                $username=$rows['username'];
                                $sn=$sn+1;

                                ?>
                                <tr>
                                        <td class="table-td"><?php echo $sn;?></td>
                                        <td class="table-td"><?php echo $name;?></td>
                                        <td class="table-td"><?php echo $username;?></td>
                                        <td class="table-td">
                                            <a href="<?php echo SITEURL; ?>admin/action/update.php?id=<?php echo $id;?>" class="btn-update">Update Admin</a>
                                            <a href="<?php echo SITEURL; ?>admin/action/delete.php?id=<?php echo $id;?>" class="btn-delete">Delete Admin</a>
                                        </td>
                                </tr>
                                
                                <?php

                            }
                        }
                        else{

                        }

                    }

                ?>
                
            </table>
            </div>
    
    </div>

</main>






<?php include('partial/footer.php')?>
<?php include('partial/nav.php')?>
    <main>
        <div class="container1">
            <h1>Appointment List</h1>

            <?php
                if(isset($_SESSION['decline'])){
                    echo $_SESSION['decline'];
                    unset($_SESSION['decline']);
                }
            ?>

            <table class="table  table-dark table-hover">
            <thead>
                <tr>
                <th scope="col">S.n.</th>
                <th scope="col">Customer Name</th>
                <th scope="col">Contact info</th>
                <th scope="col">Appointment For(click for more info)</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Decline Modal -->
            <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
                </div>
            </div>
            </div> -->
            <!--Decline Modal ends -->
            <?php
                    $sql = "SELECT * from oder";

                    $res = mysqli_query($conn, $sql) or die(mysqli_error());
                    if($res==TRUE){

                        $count= mysqli_num_rows($res);
                        $sn=0;
                        if($count>0){
                            while($rows=mysqli_fetch_assoc($res))
                            {

                                $id =$rows['id'];
                                $Cname = $rows['name'];
                                $date =$rows['date'];
                                $adress =$rows['address'];
                                $appointmentwith =$rows['appointmentwith'];
                                $email=$rows['email'];                                
                                $contact=$rows['contact'];
                                $appointment_for=$rows['appointment_for'];
                                $sn=$sn+1;

                                ?>
                                <tbody>
                                    <tr>
                                    <th scope="row"><?php echo $sn;?></th>
                                    <td><?php echo $Cname;?></td>
                                    <td><?php echo $contact;?></td>
                                    <td><a href="#" ><?php echo $appointment_for;?></a></td>
                                    <td>
                                    <a class="btn btn-light" href="#" role="button">Accept</a>
                                    <a class="btn btn-light"  href="<?php echo SITEURL; ?>admin/action/decline.php?id=<?php echo $id;?>" role="button">Decline</a>
                                    </td>
                                    </tr>                
                                
                                </tbody>
                                
                                <?php

                            }
                        }
                        else{

                        }

                    }

                ?>
             
                
            </tbody>
            </table>


        </div>

    </main>

<?php include('partial/footer.php')?>






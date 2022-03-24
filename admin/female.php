<?php include('partial/nav.php')?>
<main>
    
    <div class="container1">
    <h1>
        Ladies Section
        
     </h1>
     <h3>
     <small class="text-muted">Customize your Services</small>
     </h3>
    <br>
    <br>
    <?php
        if(isset($_SESSION['female'])){
            echo $_SESSION['female'];
            unset($_SESSION['female']);
        }
    ?>
    <br>
    <form action="" method="POST">
        <select class="form-select" aria-label="Default select example" name="dbase">
            <option selected>Open this select menu</option>
            <option value="haircutf">Hair Cut</option>
            <option  >Facial</option>
            <option value="colour">Colour</option>
        </select>
        <div class="mb-3">
            <label  class="form-label">Treatment</label>
            <input type="text" class="form-control" name="treatment">
        </div>
        <div class="mb-3">
            <label  class="form-label">Cost</label>
            <input type="text" class="form-control" name ="cost" >
        </div>
        <input type="submit"  name ="submit" value="Add" class="btn-sec" >
    </form>

    </div>
</main>
<?php include('partial/footer.php')?>

<?php
    if(isset($_POST['submit'])){
        echo $dbase=$_POST['dbase'];
        echo $treatment=$_POST['treatment'];
        echo $cost=$_POST['cost'];
        
        $sql="INSERT INTO $dbase (treatment,cost) VALUES ('$treatment', '$cost');
    ";

   //3saving data
    $res = mysqli_query($conn, $sql) ;

    //4 query execution 

    if($res==TRUE)
    {
        // echo "inserted";
        $_SESSION['female'] = "Category added successfully";

        header("location:".SITEURL.'admin/male.php');
    }
    else{
        echo die(mysqli_error($conn));
        // echo "not inserted";
        $_SESSION['female'] = "FAILURE";

        header("location:".SITEURL.'admin/male.php');
    }
    }
?>
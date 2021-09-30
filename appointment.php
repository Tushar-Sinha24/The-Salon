<?php include('configuration/connec.php');?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/appo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Saloon</title>
  </head>
  <body>

  <?php include('main-partial/nav.php');?>


  <section class="section1">
        <div class="apform">
            <form class="row g-3" action="" method="POST">
                <h3>My Appointment</h3>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputAddress" name="user_name" placeholder="Enter your Full Name">
                  </div>
            <div class="col-6">
              <label for="inputEmail4" class="form-label">Email</label>
              <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Gmail">
            </div>
            <div class="col-md-6">
                <label for="inputAddress2" class="form-label">Appointement Date</label>
                <input type="date" class="form-control" name="date" id="inputAddress2" placeholder="">
              </div>
            <div class="col-12">
              <label for="inputAddress" class="form-label">Address</label>
              <input type="text" class="form-control" name="address" id="inputAddress" placeholder="1234 Main St">
            </div>
            
            <div class="col-12>
              <label for="inputCity" class="form-label">Appointment For</label>
              <input type="text" class="form-control" name="appointment_for" id="inputCity">
            </div>
            <div class="col-6">
              <label for="inputState" class="form-label">If possible, I prefer my appointment to be with*</label>
              <select id="inputState" name="appointment_with" class="form-select">
                <option selected>Choose...</option>
                <option>No prefrence</option>
                <option>Abhay Kumar</option>
                <option>Yasmine</option>
                <option>Anandita Roy</option>
              </select>
            </div>
            <div class="col-6">
              <label for="contact" class="form-label">Conatct no.</label>
              <input type="text" class="form-control" name="contact" id="inputEmail4" placeholder="Contact no.">
            </div>
            
           
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-primary">Book</button>
            </div>
          </form>
        </div>
    </section>


    <?php include('main-partial/footer.php');?>


    <?php

if(isset($_POST[ "submit" ])){

    //1
    $name = $_POST['user_name'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $address= $_POST['address'];
    $appointment_for=$_POST['appointment_for'];
    $appointmentwith = $_POST['appointment_with'];
    $contact=$_POST['contact'];
    
    //2 sql query

    $sql="INSERT INTO oder (name, date, address, appointment_for, appointmentwith, email, contact) VALUES ('$name', '$date', '$address', '$appointment_for', '$appointmentwith', '$email', '$contact');
    ";
    
   //3saving data
    $res = mysqli_query($conn, $sql);

    //4 query execution 

    if($res==TRUE)
    {
        echo "inserted";
        // $_SESSION['add'] = "Admin added successfully";

        // header("location:".SITEURL.'admin/manage_admin.php');
    }

    else{
        echo mysqli_error($conn);
        echo "not inserted";
        // $_SESSION['add'] = "FAILURE";

        // header("location:".SITEURL.'admin/add-admin.php');
    }
}



?>
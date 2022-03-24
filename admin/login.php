<?php include('config/config.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
   
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Sign In</h3>
			</div>
			
			<?php
        if(isset($_SESSION['problem'])){
            echo $_SESSION['problem'];
            unset($_SESSION['problem']);
        }
    ?>
	
            
			<div class="card-body">
				<form action="" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="username">
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="password">
					</div>
					<div class="row align-items-center remember">
						<input type="checkbox" name="remember">Remember Me
					</div>
					<div class="form-group">
						<input type="submit" value="Login" name="login" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links">
					<p>Only for Admins</p>
				</div>
			</div>
		</div>
	</div>
    
</div>



<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>
</html>


<?php
    if(isset($_POST['login'])){
        $username=$_POST['email'];
        $password=md5($_POST['password']);

        $sql="SELECT * FROM ADMIN WHERE username='$username' AND password='$password'";
        $res=mysqli_query($conn, $sql);
         $count= mysqli_num_rows($res);
        if($count==1){
                if(isset($_POST['remember'])){
                    setcookie('emailcookie',$username,time()+864000);
                    setcookie('passwordcookie',$password,time()+864000);
                    header("location:".SITEURL.'admin/');
                }

                else{
                    header("location:".SITEURL.'admin/');
                }

            
        }
        else{
			$_SESSION['problem'] = "<div class='error'>You entered wrong User Id or password</div>";
            header("location:".SITEURL.'admin/login.php');
        }
    }
?>

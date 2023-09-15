<?php 
 
include('db.php');
 
if(isset($_POST['submit'])){
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password =  password_hash($_POST['password'], PASSWORD_DEFAULT); 
    //  $sql = "SELECT * FROM users WHERE email='$email' and password='$password'";

    $sql = "INSERT INTO users (email, password ) VALUES ('$email', '$password' )";
    
// $result = mysqli_query($conn, $sql); 
 
  

  if (mysqli_query($conn, $sql)) {
    $_SESSION['customer'] = $email;
    $_SESSION['customerid'] = mysqli_insert_id($conn);
    header('location:index.php');
  } else {
    header('location:login.php?message=2');
    echo("Error description: " . mysqli_error($conn));
  }
 



   
    
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	

	   <!-- Google Font -->
	   <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <!-- <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css"> -->
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css1/style.css" />
	
<style>

  
</style>
</head>
	<!-- Breadcrumb Section Begin -->
	<?php 
		include("nav.php");
		?>
    <!-- Breadcrumb Section End -->
	
<body class="containe-fluid">
	<div >
		 
	<div id="booking" class="section ">
		<div class="section-center">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-6 mt-4 ">
						<div class="booking-cta">
							
							<h4 class="mt-4 text-light"><b>Customer Registraton.</b></h4>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi facere, soluta magnam consectetur molestias itaque
								
							</p>
						</div>
					</div>
					<div class="col-md-6 ">
						<div class="booking-form">
							<h3 class="text-center" style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">Sing up</h3>
							<hr class="bg-danger">
                            <?php
            if(isset($_REQUEST['message'])){
                if($_GET['message'] == '2'){ 
 ?>

    <div class="alert alert-danger">Error Creating Account</div>


<?php

                }
            }
            ?>
							<form action="" method="post">
								<div class="form-group">
								<i class="fa-solid fa-user fa-xl"></i>
									<lable class="form-label">Enter your Email</lable>
									<input class="form-control" type="email" placeholder="Enter Email" name="email" required>
								</div>
								<div class="form-group">
								<i class="fa-solid fa-envelope fa-xl"></i>
								<lable class="form-label">Enter your Password</lable>
								<input class="form-control" type="password" placeholder="Enter password" name="password" required>
								</div>
								<div class="form-group">
								<i class="fa-solid fa-key fa-xl"></i>
								<lable class="form-label">Re-Enter Password</lable>
								<input class="form-control"  type="password" placeholder="Enter Re-Password" name="passwordAgain" required>
								</div>
								<p>If you have alredy sing up so please <a href="login.php" >Log in</a></p>
								<div class="form-btn">
									<button class="btn btn-md text-light " name="submit" style="background: rgb(213,7,46);
                                     background: radial-gradient(circle, rgba(213,7,46,1) 0%, rgba(48,1,3,1) 100%);">Register</button>
								</div>
							</form>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		
	</div>

	</div>
	
	
</body>
<script>
	
</script>
</html>

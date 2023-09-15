<?php 
session_start();
include('db.php');
 
if(isset($_POST['submit'])){
     $email = mysqli_real_escape_string($conn, $_POST['email']);
     $password = $_POST['password'];
    
     $sql = "SELECT * FROM users WHERE email='$email' ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
 $dbStoredPASSWORD = $row['password'];

if (password_verify ($password, $dbStoredPASSWORD)) {
     $_SESSION['customer'] = $email;
     $_SESSION['customerid'] = $row['id'];
     header('location:index.php');
  } else {
    header('location:login.php?message=1');
//    $message =  'incorrect Credentials';
  }
  


   
    
}




?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="img/Libas_logo-removebg-preview.png" ><title>Libaas-e-Hoor Creation</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"> -->
    
</head>
<body style="background: rgb(222,170,226);
background: radial-gradient(circle, rgba(222,170,226,1) 0%, rgba(242,121,242,1) 48%, rgba(82,0,81,1) 100%);">
    <?php
    include("nav.php");
    ?>
   
    <div  class="">
    <div class="modal fade " id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header  bg-danger">
       
       <h3 class="col d-flex justify-content-center text-light "><b>Log in</b></h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span class="text-light" aria-hidden="true">&times;</span>
        </button>
      </div>
      <br>
      <?php
            if(isset($_REQUEST['message'])){
                if($_GET['message'] == '1'){ 
 ?>

    <div class="alert alert-danger">Invalid Credential</div>


<?php

                }
            }
            ?>
      <form action="" method="post" class="container-fluid">
  <!-- Email input -->
  <div class="form-outline mb-4">
  <i class="fa-solid fa-envelope fa-xl text-danger"></i>
  <label class="form-label" for="form2Example1">Email Name</label>
    <input type="email" id="form2Example1" class="form-control" name="email" required/>
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
  <i class="fa-solid fa-key fa-xl text-danger"></i>
  <label class="form-label" for="form2Example2">Password</label>
    <input type="password" id="form2Example2" class="form-control" name="password" required/>
  </div>

  <!-- 2 column grid layout for inline styling -->
 

  <!-- Submit button -->
  <button type="submit" class="btn btn-outline-light  btn-block mb-4" name="submit"style="background: rgb(213,7,46);
                                     background: radial-gradient(circle, rgba(213,7,46,1) 0%, rgba(48,1,3,1) 100%);">Log in</button>

  <!-- Register buttons -->
  <div class="text-center">
    <p>Not a member? <a href="singup.php">Register</a></p>
    <p>or sign up with:</p>

    <a href=""><i class="fa-brands fa-facebook fa-lg text-danger"></i></a>
    <span>&nbsp;</span>
    <a href=""><i class="fa-brands fa-google fa-lg text-danger"></i></a>
    <span>&nbsp;</span>
    <a href=""><i class="fa-brands fa-instagram fa-lg text-danger"></i></a>
    

  </div>
</form>
<br>
      </div>
      
    </div>
  </div>
</div>
<!-- ***************************************** -->
<div class="row  mt-4 container-fluid">
  <div class="col-md-1 "></div>

  <div class="col-md-10"> 
   <div class="card bg-dark text-white mt-4">
            <img class="card-img " src="img/fashion bg.jpg" alt="Card image">
        <div class="card-img-overlay text-center mt-4 ">
          <br>                  
          <br>                  
          <br>                  
          <br>                  
           <h2 class="card-title mt-4">Welcome to </h2>
           <h1 class="card-title mt-4">Libaas-e-Hoor <span style="font-size:100%;color:red;">&hearts;</span></h1>
           <h2 class="card-title mt-4">Creation </h2>
           <h4 class="card-title mt-4">Log in here.</h4>
           <h5 class="card-text mt-4">Click on the Log in Button For more...</h5>
           
           <a href="Login.php" class="btn btn-rounded btn-lg mt-4 border border-light" data-toggle="modal" data-target="#modalContactForm" style="background: rgb(213,7,46);
                                     background: radial-gradient(circle, rgba(213,7,46,1) 0%, rgba(48,1,3,1) 100%);">Log in</a>
       
          </div>
    </div>
  </div>
  
  <div class="col-md-1"></div>
</div>


<!-- ***************************************** -->

</div>

    

       <!-- Js Plugins -->
       <!-- <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body> -->
</html>
<?php

include('db.php');
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

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
      li{list-style:none;}
    </style>
</head>

<body>

  
  
  <nav class="navbar navbar-expand-lg navbar-light bg-danger" style="background: rgb(213,7,46);
background: radial-gradient(circle, rgba(213,7,46,1) 0%, rgba(48,1,3,1) 100%);">
 <a class="navbar-brand text-light " href="index.php" style="font-family:Brush Script MT, Brush Script Std, cursive;"><img src="img/libas-Round.png" alt="" width="50px"> Libaas-e-Hoor Creation</a>
 <button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   <span class="navbar-toggler-icon "></span>
 </button>

 <div class="collapse navbar-collapse ml-5" id="navbarSupportedContent">
   <ul class="navbar-nav mr-auto ">
     <li class="nav-item active">
       <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a>
     </li>
     <li class="nav-item">
       <a class="nav-link text-light" href="shop.php">Shopping</a>
     </li>
     
     <li class="nav-item">
       <a class="nav-link text-light" href="about.php">About us</a>
     </li>
     <li class="nav-item">
       <a class="nav-link text-light" href="contact.php">Contact</a>
     </li>
     <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
       Category
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       <?php
                  $sql2 = "SELECT * FROM category";
                  $result2 = mysqli_query($conn, $sql2);
              
                
                      // output data of each row
                      while($row2 = mysqli_fetch_assoc($result2)) {
              
                          ?> 
						  <a class="dropdown-item" href="shop.php?id=<?php echo $row2["cat_id"] ?>"><?php echo  $row2["cat_name"] ?></a>
 <?php
                      }
                  
                  ?>
         </div>
       </li>
   
   </ul>
   <ul>
   <li class="nav-item dropdown container-fluid">
      
      <div class="dropdown">
    <button type="button" class="btn text-light border border-light" style="background-color:black;" data-toggle="dropdown">Cart
  <?php 
  $count = '';
   
  if(isset($_SESSION['cart'])){
   $cart = $_SESSION['cart'];
   $count = count($cart);
  }
  ?>
     <i class="fa fa-shopping-cart text-light" aria-hidden="true"></i>  <span class="badge badge-pill badge-warning text-light">
   <?php echo $count?>
   </span>
    </button>
    <div class="dropdown-menu">

  <?php
  if(isset($_SESSION['cart'])){
$total = 0;
foreach($cart as $key => $value){
// echo $key ." : ". $value['quantity'] . "<br>";

$sql = "SELECT * FROM products where product_id = $key";
$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);


?>
      
      <div class="row cart-detail">
        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">
          <img src="admin/<?php echo $row['thumb']?> " >
        </div>
        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">
          <p><a class="text-dark"href="single.php?id=<?php echo $row['product_id']?>"><?php echo $row['product_name']?></a></p>
          <span class="price text-info"> PKR <?php echo $row['price']?></span> 
        <span class="count"> Quantity:<?php echo $value['quantity']?></span>
        </div>
      </div>

    <?php
    $total = $total +  ($row['price'] * $value['quantity']);
  }
    ?>



    <div class="row total-header-section">
          <div class="col-lg-6 col-sm-6 col-6">
            <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">
          <?php echo $count?>
          </span>
          </div>
          <div class="col-lg-6 col-sm-6 col-6 total-section text-right">
            <p>Total: <span class="text-info">PKR <?php echo $total ?></span></p>
          </div>
      </div>

      <div class="row">
        <div class="col-lg-12 col-sm-12 col-12 text-center checkout">
           
        <a href='checkout.php' class="btn btn-primary btn-block">Checkout</a>
        <a href='cart.php' class="btn btn-primary btn-block">Cart</a>
        </div>
      </div>
    </div>
</div> 
</li>
<?php   }?>
   </ul>
   <ul>

   <li class="nav-item dropdown">
       <a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         Account
       </a>
       <div class="dropdown-menu" aria-labelledby="navbarDropdown">
       <a class="dropdown-item" href="myaccount.php">My Account</a>
       <hr>
		   <a class="dropdown-item" href="show-wishlist.php">My Wishlist</a>
       <hr>
		   <a class="dropdown-item" href="logout.php">Logout</a>
         </div>
       </li>
   </ul>
  
 </div>
</nav>
  
   
   <!-- navbar end -->

    

    <!-- Search Begin -->
    <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div>
    <!-- Search End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery.nicescroll.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.countdown.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>
</body>

</html>
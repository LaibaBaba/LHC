
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    

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
</head>

<body>
<?php 
   include("nav.php");

   
   ?>
 <div class="container my-3">
    <div class="alert alert-success" role="alert">
      <h4 class="alert-heading">Welcome - </h4>
      <p>Hey how are you doing? Welcome to iSecure. You are logged in as . Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
      <hr>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
             <span aria-hidden="true">×</span>
         </button>
      <p class="mb-0">Whenever you need to, be sure to logout <a href="logout.php"> using this link.</a></p>
      
    </div>
  </div>
    

    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="shop__sidebar">
                        <div class="shop__sidebar__search">
                            <form action="#">
                                <input type="text" placeholder="Search...">
                                <button type="submit"><span class="icon_search"></span></button>
                            </form>
                        </div>
                        <div class="shop__sidebar__accordion">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseOne">Categories</a>
                                    </div>
                                    <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__categories">
                                                <ul class="nice-scroll">
                                                    
                                                    <li><a href="#">Clothing (20)</a></li>
                                                    
                                                    
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-heading">
                                        <a data-toggle="collapse" data-target="#collapseTwo">Branding</a>
                                    </div>
                                    <div id="collapseTwo" class="collapse show" data-parent="#accordionExample">
                                        <div class="card-body">
                                            <div class="shop__sidebar__brand">
                                                <ul>
                                                    <li><a href="#">Libaas-e-Hoor</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="shop__product__option">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__left">
                                    <p>Showing 1–12 of 126 results</p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="shop__product__option__right">
                                    <p>Sort by Price:</p>
                                    <select>
                                        <option value="">Low To High</option>
                                        <option value="">PKR 5,000 - PKR 50,000</option>
                                        <option value="">PKR 60,000 - PKR 1,00,000 </option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 


$sql = "SELECT * FROM products";
if(isset($_GET['id'])){
    $catID = $_GET['id'];
    $sql .= " WHERE cat_id = '$catID'";
}


$result = mysqli_query($conn, $sql);
 
  
    // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";

?> 
                    <div class="row ">
                        <?php while($row = mysqli_fetch_assoc($result)) { ?>
                        <div class="col-md-3 shadow-none p-3 mb-5 bg-light rounded">
                            <div class="product__item">
                                <a href=""><div class="product__item__pic set-bg img-fixed" data-setbg="admin/<?php echo  $row["thumb"] ?>"></a>
                                    <ul class="product__hover">
                                        <li><a href="wishlist.php"><img src="img/icon/heart.png" alt=""></a></li>      
                                     </ul>
                                </div>
                                <a   href='single.php?id=<?php echo  $row["product_id"] ?>' class="btn btn btn-sm  pull-left ml-5">
                        <i class="fa fa-eye"></i> Details</a> <br>
                                <div class="product__item__text">
                                    <h6><?php echo  $row["product_name"] ?></h6>
                                    <a href='addToCart.php?id=<?php echo  $row["product_id"] ?>'  class="add-cart">+ Add To Cart</a>
                                
                                    <h5>PKR <?php echo  $row["price"] ?></h5>
                                    
                                </div>
                            </div>
                        </div>
                        <?php
                  }  
                  ?>
                    </div>
                  
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->

    <?php 
   include("footer.php");
   ?>

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
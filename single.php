

<?php include('nav.php');  

include('db.php');
$message =  '';

if(isset($_POST['submit'])){
    $product_id = $_GET['id'];
    $c_id = $_SESSION['customerid']; 

        // $name  = $_POST['name']; 
        // $email  = $_POST['email']; 
    $review  = $_POST['review']; 

    $insertReview = "INSERT INTO reviews (pid, uid, review)
	VALUES ('$product_id','$c_id' ,'$review' )";  

	if(mysqli_query($conn, $insertReview)){
        $message = 'Review Submitted';
    }


}



if(isset($_GET['id'])){
    $product_id = $_GET['id'];
   $sql = "SELECT * FROM products  WHERE product_id='$product_id'";
   $result = mysqli_query($conn, $sql);
 
$row = mysqli_fetch_assoc($result);

$product_name  = $row['product_name'];
$cat_id  = $row['cat_id']; 
$price  = $row['price'];
$product_description  = $row['product_description'];
$thumb  = $row['thumb'];
}


?>
 
 
 
<div class="">

    <div class="row text-white">
        <div class="col-md-6 ">
            <img src="admin/<?php echo $thumb ?>" alt="" class='img-fluid' style='height:500px;width:500px;'>
        </div>
        <div class="col-md-6 pt-5 text-dark">
        <h3 class="text-dark"><b><?php echo $product_name ?></b></h3>
        <h2 class="text-dark"><b>PKR <?php echo  $price ?> </b></h2>
<p class="text-dark">     <?php echo $product_description ?></p>            
       
<div class="row">
    <div class="col-md-2 text-dark">
        Quantity:
    </div>
    <div class="col-md-2">
    <form action='addToCart.php'>  
    <input type="hidden" name='id' value='<?php echo  $product_id ?>'>
        <input type="number" class='form-control' name='quantity' value='1'> 
       
    </div>
   

</div>

<div class="row ">
    <div class="col-md-12 category">

    <?php
                  
        
                  $sql2 = "SELECT * FROM category where cat_id = '$cat_id'";
                  $result2 = mysqli_query($conn, $sql2); 
                      // output data of each row
                      $row2 = mysqli_fetch_assoc($result2)
                          ?> 
     Categories - <a href="index.php?id=<?php echo $cat_id ?>"><?php echo $row2["cat_name"] ?></a>   
                
     
    </div>
    <!-- <div class="col-md-12 category">
        Tags - <a href="#">Tag 1</a>, <a href="#">Tag 2</a>, <a href="#">Tag 3</a>
    </div> -->
</div>
<div class="row mt-4">
    <div class="col-md-4">
    <button  type='submit' class="btn btn-dark pull-right"  >
                        <i class="fa fa-cart-arrow-down"></i> Add To Cart
                    </button>
    </div>
  
    <div class="col-md-4">
    <a href="wishlist.php?id=<?php echo $_GET['id'] ?>" class="btn btn-danger
     pull-left"><i class="fa fa-heart" aria-hidden="true"></i> Wishlist</a>
    </div>
</div>
</form>


</div>
        
        </div>






        <br>
        <br>


<?php include('footer.php');  ?>




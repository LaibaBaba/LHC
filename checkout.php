<?php  
session_start();
  
 
include('db.php');
if(!isset($_SESSION['customer']) && empty($_SESSION['customer']) ){
 header('location:login.php');
}

 
if(!isset($_SESSION['customerid'])){
	echo '<script>window.location.href = "login.php";</script>';

}

// echo '<pre>';
// print_r($_POST);
// echo '</pre>';
$total = 0;
if(isset($_SESSION['cart'])){
	 $cart = $_SESSION['cart'];
	foreach($cart as $key => $value){
	 // echo $key ." : ". $value['quantity'] . "<br>";
	 
	 $sql_cart = "SELECT * FROM products where product_id = $key";
	$result_cart = mysqli_query($conn, $sql_cart);
	$row_cart = mysqli_fetch_assoc($result_cart);
	$total = $total +  ($row_cart['price'] * $value['quantity']);
}
}


$message  = '';
$_POST['agree'] = 'false';

if(isset($_POST['submit'])){
	 
	if($_POST['agree'] == true){
	$country = $_POST['country'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$companyName = $_POST['companyName'];
	$addr1 = $_POST['addr1'];
	$addr2 = $_POST['addr2'];
	$city = $_POST['city'];
	$state = '';
	$Postcode = $_POST['Postcode'];
	$Email = '';
	$Phone = $_POST['Phone'];
	$payment = $_POST['payment'];
	$agree = $_POST['agree'];
	$cid = $_SESSION['customerid']; 
	$sql = "SELECT * FROM user_data where userid = $cid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if (mysqli_num_rows($result) == 1) {
//   update query
$up_sql = "UPDATE user_data SET firstname='$fname', lastname='$lname', company='$companyName', address1='$addr1', address2='$addr2', city='$city', country='$country', zip='$Postcode', mobile='$Phone'  WHERE userid=$cid";

$Updated = mysqli_query($conn, $up_sql);
if($Updated){

	if(isset($_SESSION['cart'])){
		$total = 0;
		foreach($cart as $key => $value){
		 // echo $key ." : ". $value['quantity'] . "<br>";
		 
		 $sql_cart = "SELECT * FROM products where product_id = $key";
		$result_cart = mysqli_query($conn, $sql_cart);
		$row_cart = mysqli_fetch_assoc($result_cart);
		$total = $total +  ($row_cart['price'] * $value['quantity']);
	}
	}


	// echo 'order table and order items - updated';

	$insertOrder = "INSERT INTO orders (userid, totalprice, orderstatus, paymentmode )
	VALUES ('$cid', '$total', 'Order Placed', '$payment')";  

	if(mysqli_query($conn, $insertOrder)){
	 
		$orderid = mysqli_insert_id($conn); 
		foreach($cart as $key => $value){ 
			$sql_cart = "SELECT * FROM products where product_id = $key";
		   $result_cart = mysqli_query($conn, $sql_cart);
		   $row_cart = mysqli_fetch_assoc($result_cart); 
			$price_product = $row_cart["price"];
			 $q  = $value["quantity"];
		   $insertordersItems = "INSERT INTO ordersItems (orderid, productid, quantity, productprice) 
		    VALUES ('$orderid', '$key', '$q', '$price_product')";
		   
		   if(mysqli_query($conn, $insertordersItems)){
			//    echo 'inserted on both table orders and ordersItems';
			unset($_SESSION['cart']);
			// header("location:myaccount.php");
			echo '<script>window.location.href = "myaccount.php";</script>';

		
		   }


	   }

	

	}
}
} else {
  // insert 
 


  $ins_sql = "INSERT INTO user_data (userid, firstname, lastname, company, address1, address2, city, country, zip, mobile)
  VALUES ('$cid', '$fname', '$lname', '$companyName', '$addr1', '$addr2', '$city', '$country', '$Postcode', '$Phone')"; 
$inserted = mysqli_query($conn, $ins_sql);
if($inserted){
	// echo 'order table and order items - inserted';
	
	if(isset($_SESSION['cart'])){
		$total = 0;
		foreach($cart as $key => $value){
		 // echo $key ." : ". $value['quantity'] . "<br>";
		 
		 $sql_cart = "SELECT * FROM products where product_id = $key";
		$result_cart = mysqli_query($conn, $sql_cart);
		$row_cart = mysqli_fetch_assoc($result_cart);
		$total = $total +  ($row_cart['price'] * $value['quantity']);
	}
	}


	// echo 'order table and order items - updated';

	$insertOrder = "INSERT INTO orders (userid, totalprice, orderstatus, paymentmode )
	VALUES ('$cid', '$total', 'Order Placed', '$payment')";  

	if(mysqli_query($conn, $insertOrder)){
	 
		$orderid = mysqli_insert_id($conn); 
		foreach($cart as $key => $value){ 
			$sql_cart = "SELECT * FROM products where product_id = $key";
		   $result_cart = mysqli_query($conn, $sql_cart);
		   $row_cart = mysqli_fetch_assoc($result_cart); 
			$price_product = $row_cart["price"];
			 $q  = $value["quantity"];
		   $insertordersItems = "INSERT INTO ordersItems (orderid, productid, quantity, productprice) 
		    VALUES ('$orderid', '$key', '$q', '$price_product')";
		   
		   if(mysqli_query($conn, $insertordersItems)){
			//    echo 'inserted on both table orders and ordersItems';
			unset($_SESSION['cart']);
			// header("location:myaccount.php");
			echo '<script>window.location.href = "myaccount.php";</script>';

		
		   }


	   }

	

	}
}

}
}else{
	$message =  'agreen to terms and condition';
}


}


$cid =$_SESSION['customerid'];

$sql = "SELECT * FROM user_data where userid = $cid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


 ?>



 
 

<div class=" text-dark">

<?php
// echo "<pre>";
// print_r($_SESSION['cart']);
// echo "</pre>";



if(isset($_SESSION['cart'])){
	$total = 0;
	foreach($cart as $key => $value){
	 // echo $key ." : ". $value['quantity'] . "<br>";
	 
	 $sql_cart = "SELECT * FROM products where product_id = $key";
	$result_cart = mysqli_query($conn, $sql_cart);
	$row_cart = mysqli_fetch_assoc($result_cart);
	$total = $total +  ($row_cart['price'] * $value['quantity']);
}
}



?>

<!DOCTYPE html>
<body>
<?php
include('nav.php'); 
?>
   

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__text">
                        <h4>Check Out</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="checkout__form">
                <form action="" method="post"><?php echo $message ?>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <h6 class="checkout__title">Billing Details</h6>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text"  name='fname' required value=" <?php if(isset($row['firstname'])) { echo $row['firstname']; } ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text"  name='lname' required value="<?php if(isset($row['lastname'])) {echo $row['lastname']; } ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Country<span>*</span></p>
                                <input type="text" name='country'>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name='addr1' required placeholder="Street Address" class="checkout__input__add" value="<?php if(isset($row['address1'])) {echo $row['address1']; } ?>">
                                <input type="text" name='addr2' required placeholder="Apartment, suite, unite ect (optinal)" value="<?php if(isset($row['address2'])) {echo $row['address2'];  } ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text"  name='city' required value="<?php if(isset($row['city'])) {echo $row['city']; } ?>">
                            </div>
                            <div class="checkout__input">
                                <p>Company Name<span>*</span></p>
                                <input type="text" name='companyName' required value="<?php if(isset($row['company'])) {echo $row['company']; } ?>">
                            </div>
                            
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text"name='Phone'required value="<?php if(isset($row['mobile'])) {echo $row['mobile']; } ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Postcode / ZIP<span>*</span></p>
                                        <input type="text" name='Postcode'required value="<?php if(isset($row['zip'])) {echo $row['zip']; } ?>">
                                    </div>
                                </div>
                            </div>   
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4 class="">Your order</h4>
                            
                                <ul class="checkout__total__all">
                                    <li>Subtotal <span><?php echo $total?>/-</span></li>
                                    <li>Total <span><?php echo $total?>/-</span></li>
                                </ul>
                                <h5 class="heading">Payment Method</h5>
                                <hr>
                                <div class="">
                                    <label for="payment">
                                        COD
                                        <input name="payment" value='COD'  id="radio1" class="mr-2 css-checkbox" type="radio" required >
                                        </label>
                                </div>
                                <div class="">
                                    <label for="payment">
                                        Check Payment
                                        <input name="payment" value='Cheque'  id="radio2" class="mr-2 css-checkbox" type="radio" required>
                                        </label>
                                </div>
                                <input name="agree" value='true' id="checkboxG2" class="mr-2 css-checkbox " type="checkbox" required><span>I've read and accept the <a href="#">terms &amp; conditions</a></span>
                                <button type="submit" name='submit' class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->

    <?php include('footer.php'); ?>
</body>

</html>
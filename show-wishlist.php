<?php 
session_start();
include('db.php');
 include('nav.php'); 
?>
 
 
 
 
<div class="container text-dark">
    <h2 class='text-center text-dark'>My Wishlist</h2>

    <section id="content">
		<div class="content-blog content-account">
			<div class="container">
				<div class="row">
				 
					<div class="col-md-12">

		 
			<br>
			<table class="cart-table account-table table table-bordered bg-white text-dark">
				<thead>
					<tr>
						<th>Product Name</th>
						<th>Price</th>
					 
						<th>Date and Time</th>
						
					</tr>
				</thead>
				<tbody>
				<?php
				$c_id = $_SESSION['customerid']; 
  
				$sql = "SELECT * FROM wishlist JOIN products on products.product_id=wishlist.pid";
				$result = mysqli_query($conn, $sql);
			  
				if (mysqli_num_rows($result) > 0) {
				 // output data of each row
				 while($row = mysqli_fetch_assoc($result)) {
 			?>
					<tr>
						<td>
                        <a href="single.php?id=<?php echo $row["product_id"] ?>">	<?php echo $row["product_name"] ?></a>
						
						</td>
						<td>
						<?php echo $row["price"] ?>
						</td>
					 
						<td>
						

						<?php echo date('M j g:i A', strtotime($row["timestamp"]));  ?>		
						</td>
						
					</tr>
				 
			
			<?php
				}
			   } else {
				 echo "0 results";
			   }
			 
			 
			 ?>




				
				</tbody>
			</table>		

		 
 



			</div>

					</div>
				</div>
			</div>
		</div>
	</section>
	
 
</div>







<?php include('footer.php');  ?>



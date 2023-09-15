<?php

session_start();
include('db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
 header('location:login.php');
}



if(isset($_POST['submit'])){
$catName = $_POST['catName'];

$sql = "INSERT INTO category (cat_name) VALUES ('$catName')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
  header('location:categories.php');
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

}


?> 


<?php include('AdminNav.php') ?>

<div class="container">

<div class="card">
    <div class="card-header">
        Add Category
    </div>
    <div class="card-body">

    <form action="addCategory.php" method='post'>
             <div class="form-group">
            <label for="catName"> Name:</label>
            <input type="text" class="form-control" id="catName" name='catName'>
            </div> 
            <button type="submit" name='submit' class="btn btn-primary">Submit</button>
    </form>

    </div>
</div>



</div>







<?php include('Admin_Footer.php') ?>
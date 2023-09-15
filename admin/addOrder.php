<?php

session_start();
include('db.php');
if(!isset($_SESSION['email']) && empty($_SESSION['email']) ){
 header('location:login.php');
}
?>

<?php include('AdminNav.php') ?>



<?php include('Admin_Footer.php') ?>
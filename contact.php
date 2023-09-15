
<?php

include ("db.php");

  
  if (isset($_POST["submit_btn"])) {
   
    $name = $_POST["Name"];
    $email = $_POST["Email"];
    $message = $_POST["Message"];
    
    $sql= "INSERT INTO `contactus`( `name`, `email`, `message`,`dt`) VALUES ('$name','$email','$message',current_timestamp())";

    if (mysqli_query($conn,$sql)) {
        $alertMessage = "Message send Succesfully";
        // Using PHP echo to print a JavaScript script that will display the alert.
        echo "<script type='text/javascript'>alert('$alertMessage');</script>";
    }
    else {
        $alertMessage = "not send";
        // Using PHP echo to print a JavaScript script that will display the alert.
        echo "<script type='text/javascript'>alert('$alertMessage');</script>";

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
    <!-- Map Begin -->
    <div class="map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3616.412391734814!2d67.0582735743026!3d24.98609934022082!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb340e303bc8bd1%3A0x83ed902b169e9c79!2sAl%20Ghafoor%20Regency%20Apartments%20North%20Karachi!5e0!3m2!1sen!2s!4v1688911065541!5m2!1sen!2s" width="600" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
    </div>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad ">
        <div class="container">
            <div class="row ">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text ">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Contact Us</h2>
                            <hr>
                            <p>As you might expect of a company that began as a high-end interiors contractor, we pay
                                strict attention.</p>
                        </div>
                        <ul>
                            <li>
                                <h4 class="text-success">#PAKISTAN</h4>
                                <p>195 E Parker Square Dr, Parker, CO 801 <br />+43 982-314-0958</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 ">
                    <div class="contact__form">
                        <form action="contact.php" method="post" >
                            <div class="row ">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="email" placeholder="Email" name="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message" name="Message"></textarea>
                                    <button type="submit" name="submit_btn" class="site-btn" style="background: rgb(213,7,46);
                                     background: radial-gradient(circle, rgba(213,7,46,1) 0%, rgba(48,1,3,1) 100%);">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

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

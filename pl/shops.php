<?php
include_once("../include/constants.php");
include("../include/content.php");

$connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

# What if it doesnt work
if ($connection->connect_error) {
  echo "Connection to database failed :(";
}

$query_string = "SELECT * FROM Location;";

$result = $connection->query($query_string);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
}

$address = $row['address_location'];
$phone = $row['phone_location'];
$email = $row['email_location'];
$flink = $row['facebook_link'];
$blink = $row['booking_link'];

$connection->close();
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Noclegi Mudrak</title>
    <?php echo $include_headers_main; ?>
  </head>
  <body>
	  <?php echo $navbar_pl; ?>

    <section class="section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Shops</h2>
            <p data-aos="fade-up" data-aos-delay="100">Meet local handicrafts.</p>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 col-lg-4" data-aos="fade-up">
              <figure class="img-wrap">
                <img src="../shared/images/shop1.jpg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Ceramics</h2>
                <span class="text-uppercase letter-spacing-1">You can find here many private ceramics factories</span>
              </div>
          </div>


        </div>
      </div>
    </section>
    
    
    <?php get_footer_pl($address, $phone, $email, $flink, $blink); ?>
    
    <script src="../shared/js/jquery-3.3.1.min.js"></script>
    <script src="../shared/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="../shared/js/popper.min.js"></script>
    <script src="../shared/js/bootstrap.min.js"></script>
    <script src="../shared/js/owl.carousel.min.js"></script>
    <script src="../shared/js/jquery.stellar.min.js"></script>
    <script src="../shared/js/jquery.fancybox.min.js"></script>
    
    
    <script src="../shared/js/aos.js"></script>
    
    <script src="../shared/js/bootstrap-datepicker.js"></script> 
    <script src="../shared/js/jquery.timepicker.min.js"></script> 
    <script src="../shared/js/main.js"></script></body>
</html>
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


$query_string = "SELECT price FROM Rooms;";

$result = $connection->query($query_string);
$prices = [];
$index = 0;

while ($row = $result->fetch_assoc()) {
  $prices[$index++] = $row['price'];
}

$query_string = "SELECT name FROM Location_Photo;";
$result = $connection->query($query_string);

$photos = array();

while ($row = $result->fetch_assoc()) {
  array_push($photos, $row['name']);
}

$connection->close();

?>

<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Noclegi Mudrak</title>
  <?php echo $include_headers_main; ?>
</head>

<body>
  <?php echo $navbar_en; ?>

  <!-- The slideshow -->
  <div id="photos" class="carousel slide" data-ride="carousel">

    <!-- The photos -->
    <div class="carousel-inner">
      <?php

      for ($index = 0; $index < count($photos); $index++) {
        echo "
          <div class='carousel-item " . (($index == 0) ? "active" : "") . "'>
            <img src='../shared/images/" . $photos[$index] . "' class='carousel-image' >
          </div>
        ";
      }

      ?>
    </div>

    <!-- Left and right controls -->
    <a class="carousel-control-prev" href="#photos" data-slide="prev">
      <span class="carousel-control-prev-icon"></span>
    </a>
    <a class="carousel-control-next" href="#photos" data-slide="next">
      <span class="carousel-control-next-icon"></span>
    </a>


  </div>

  <?php echo $booking_search_en; ?>

  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-12 col-lg-7 ml-auto order-lg-2 position-relative mb-5" data-aos="fade-up">

          <img src="../shared/images/outside4.jpeg" alt="Image" class="img-fluid rounded">
        </div>
        <div class="col-md-12 col-lg-4 order-lg-1" data-aos="fade-up">
          <h2 class="heading">Welcome!</h2>
          <p class="mb-4">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>

      </div>
    </div>
  </section>

  <section id="rooms" class="section">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">Rooms</h2>
          <p data-aos="fade-up" data-aos-delay="100">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a href="rooms.php" class="room">
            <figure class="img-wrap">
              <img src="../shared/images/room1.1.jpeg" alt="" class="img-fluid mb-3">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>Room 1</h2>
              <span class="text-uppercase letter-spacing-1"><?php echo $prices[0] ?> zł / per night</span>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a href="rooms.php" class="room">
            <figure class="img-wrap">
              <img src="../shared/images/room2.2.jpeg" alt="" class="img-fluid mb-3">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>Room 2</h2>
              <span class="text-uppercase letter-spacing-1"><?php echo $prices[1] ?> zł / per night</span>
            </div>
          </a>
        </div>

        <div class="col-md-6 col-lg-4" data-aos="fade-up">
          <a href="rooms.php" class="room">
            <figure class="img-wrap">
              <img src="../shared/images/room3.1.jpg" alt="" class="img-fluid mb-3">
            </figure>
            <div class="p-3 text-center room-info">
              <h2>Room 3</h2>
              <span class="text-uppercase letter-spacing-1"><?php echo $prices[2] ?> zł / per night</span>
            </div>
          </a>
        </div>


      </div>
    </div>
  </section>
  <section id="information" class="section blog-post-entry bg-light">
    <div class="container">
      <div class="row justify-content-center text-center mb-5">
        <div class="col-md-7">
          <h2 class="heading" data-aos="fade-up">Location</h2>
          <p data-aos="fade-up">We have prepared several suggestions of places nearby that may interest you.</p>
        </div>
      </div>
      <div id="location-content-div" data-aos="fade-up">

        <div class="content-cards">
          <div class="card mb-3" style="height: auto;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img style="object-fit: cover; height: 100%" src="../shared/images/atr1.jpg" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <a href="culture.php" class="mb-4 d-block">
                    <h5 class="card-title">Culture</h5>
                    <p class="loc">There are a couple of cultural activities close by</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3" style="height: auto;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img style="object-fit: cover; height: 100%" src="../shared/images/atr2.jpg" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <a href="nature.php" class="mb-4 d-block">
                    <h5 class="card-title">Nature</h5>
                    <p class="loc">See here the beautiful nature close by</p>
                  </a>
                </div>
              </div>
            </div>
          </div>
          <div class="card mb-3" style="height: auto;">
            <div class="row no-gutters">
              <div class="col-md-4">
                <img style="object-fit: cover; height: 100%" src="../shared/images/atr3.jpg" class="card-img">
              </div>
              <div class="col-md-8">
                <div class="card-body">
                  <a href="shops.php" class="mb-4 d-block">
                    <h5 class="card-title">Shops</h5>
                    <p class="loc">Meet local handicrafts</p>
                  </a>
                  <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                </div>
              </div>
            </div>
          </div>

        </div>
        <div id="map-container-google-1" class=" rounded z-depth-1-half map-container">
          <!--<iframe frameborder="0" style="border: 0;" src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyDRIG7EyuooxjDO8fz7IygRR2EJ22qeGtc&center=47.64919455026912,-122.34805830535075&zoom=12&format=png&maptype=roadmap&size=480x360" allowfullscreen></iframe> -->
          <iframe frameborder="0" style="border:0" src="https://maps.google.com/maps?q=gieraltow&t=&z=17&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
        </div>
  </section>

  <?php get_footer_en($address, $phone, $email, $flink, $blink); ?>

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


  <script src="../shared/js/main.js"></script>
</body>

</html>
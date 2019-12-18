<?php
    include("../include/constants.php");

    $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

    # What if it doesnt work
    if ($connection->connect_error){
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
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Noclegi Mudrak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700">

    <link rel="stylesheet" href="../shared/css/bootstrap.min.css">
    <link rel="stylesheet" href="../shared/css/animate.css">
    <link rel="stylesheet" href="../shared/css/owl.carousel.min.css">
    <link rel="stylesheet" href="../shared/css/aos.css">
    <link rel="stylesheet" href="../shared/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="../shared/css/jquery.timepicker.css">
    <link rel="stylesheet" href="../shared/css/fancybox.min.css">
    <link rel="stylesheet" href="../shared/css/_custom.css">
    <link rel="stylesheet" href="../shared/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../shared/fonts/fontawesome/css/font-awesome.min.css">

    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js" integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==" crossorigin=""></script>
  
    <!-- Theme Style -->
    <link rel="stylesheet" href="../shared/css/style.css">
  </head>
  <body>
	  <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Noclegi Mudrak</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav text-uppercase ml-auto">
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#rooms">Our Rooms</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#information">Information</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
          </li>
			 <li class="nav-item">
				 <a class="nav-link js-scroll-trigger" href="#contact"><i class="fa fa-globe"></i></a>
          </li>
        </ul>
      </div>
    </div>
	  </nav>  
    <!-- END head -->
 
          
<div id="photos" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#photos" data-slide-to="0" class="active"></li>
    <li data-target="#photos" data-slide-to="1"></li>
    <li data-target="#photos" data-slide-to="2"></li>
	  <li data-target="#photos" data-slide-to="3"></li>
  </ul>

  <!-- Indicators -->

  <!-- The slideshow -->
  <div class="carousel-inner">
    <?php

      for ($index = 0; $index < count($photos); $index++) {
        echo "
          <div class='carousel-item " . (($index == 0) ? "active" : "") . "'>
            <img src='../shared/images/" . $photos[$index] . "' style='height: 90vh; width: 100%; object-fit: cover' >
          </div>
        ";
      }

    ?>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
   
        
	  </div>
       <!--
      <a class="mouse smoothscroll" href="#next">
        <div class="mouse-icon">
          <span class="mouse-wheel"></span>
        </div>
	  </a>-->
    <!-- END section -->

    <section class="section bg-light pb-0"  >
      <div class="container">
       
        <div class="row check-availabilty" id="next">
          <div class="block-32" data-aos="fade-up" data-aos-offset="-200">

            <form action="#">
              <div class="row">
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkin_date" class="font-weight-bold text-black">Check In</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="text" id="checkin_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-lg-0 col-lg-3">
                  <label for="checkout_date" class="font-weight-bold text-black">Check Out</label>
                  <div class="field-icon-wrap">
                    <div class="icon"><span class="icon-calendar"></span></div>
                    <input type="text" id="checkout_date" class="form-control">
                  </div>
                </div>
                <div class="col-md-6 mb-3 mb-md-0 col-lg-3">
                  <div class="row">
                    <div class="col-md-6 mb-3 mb-md-0">
                      <label for="adults" class="font-weight-bold text-black">Persons</label>
                      <div class="field-icon-wrap">
                        <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                        <select name="" id="adults" class="form-control">
                          <option value="">1</option>
                          <option value="">2</option>
                          <option value="">3</option>
                          <option value="">4</option>
                        </select>
                      </div>
					  </div>
                  </div>
                </div>
                <div class="col-md-6 col-lg-3 align-self-end">
                  <button id="check-availabilty-btn" class="btn btn-primary btn-block text-white">Check Availabilty</button>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </section>

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
            <a href="rooms.html" class="room">
              <figure class="img-wrap">
                <img src="../shared/images/room1.1.jpeg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Room 1</h2>
                <span class="text-uppercase letter-spacing-1"><?php echo $prices[0] ?> zł / per night</span>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <a href="rooms.html" class="room">
              <figure class="img-wrap">
                <img src="../shared/images/room2.2.jpeg" alt="Free website template" class="img-fluid mb-3">
              </figure>
              <div class="p-3 text-center room-info">
                <h2>Room 2</h2>
                <span class="text-uppercase letter-spacing-1"><?php echo $prices[1] ?> zł / per night</span>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-4" data-aos="fade-up">
            <a href="rooms.html" class="room">
              <figure class="img-wrap">
                <img src="../shared/images/room3.1.jpg" alt="Free website template" class="img-fluid mb-3">
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
            <p data-aos="fade-up">Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.</p>
          </div>
        </div>
        <div id="location-content-div" data-aos="fade-up">
            
            <div class="content-cards">
                <div class="card mb-3" style="height: auto;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img style="object-fit: cover; height: 100%" src="https://www.backpacker.com/.image/t_share/MTQ5NTkxODMyNDA4MzY4NjA0/35541767156_8ba52234a0_o.jpg" class="card-img">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">Hiking</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-3" style="height: auto;">
                        <div class="row no-gutters">
                            <div class="col-md-4">
                                <img style="object-fit: cover; height: 100%" src="https://storage.googleapis.com/smstl/20181129/205/louie-demun-best-new-restaurant-lg-1.jpg" class="card-img">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Restaurants</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                    <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
            <div id="map-container-google-1" class=" rounded z-depth-1-half map-container">
              <!--<iframe frameborder="0" style="border: 0;" src="https://maps.googleapis.com/maps/api/staticmap?key=AIzaSyDRIG7EyuooxjDO8fz7IygRR2EJ22qeGtc&center=47.64919455026912,-122.34805830535075&zoom=12&format=png&maptype=roadmap&size=480x360" allowfullscreen></iframe> -->
              <iframe frameborder="0" style="border:0" src="https://maps.google.com/maps?q=almeria&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe>
            </div>
    </section>

    <footer id="contact" class="section footer-section">
      <div class="container">
        <div class="row mb-4">
           <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="rooms.html">The Rooms</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span> <br> <?php echo $address ?></span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span><?php echo $phone ?></span></p>
            <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span><?php echo $email ?></span></p>
			      <p><span class="d-block"><span class="fa-fa-facebook h5 mr-3 text-primary"></span>Facebook:</span> <span> <?php echo $flink ?></span></p>
			      <p><span class="d-block"><span class="fa-fa-tripadvisor h5 mr-3 text-primary"></span>Booking:</span> <span> <?php echo $blink ?></span></p>
          </div>
          <form class="col-md-5 mb-5 pr-md-5 contact-info" action="../include/send_mail.php" method="post">
            <input name="name" type="text" style="margin: 0.5rem; width: 100%; padding: 1rem;" placeholder="Name">
            <input name="email" type="email" style="margin: 0.5rem; width: 100%; padding: 1rem;" placeholder="Email">
            <textarea name="text" class="rounded" style="margin: 0.5rem; width: 100%; padding: 1rem;" placeholder="Type here"></textarea>
            <input type="submit" value="send" class="btn btn-primary btn-block text-white" style="margin: 0.5rem;">
          </form>
        </div>
      </div>
    </footer>
    
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
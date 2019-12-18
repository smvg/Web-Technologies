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


    $query_string = "SELECT price, capacity FROM Rooms;";

    $result = $connection->query($query_string);
    $prices = [];
    $capacity = [];
    $index = 0;

    while ($row = $result->fetch_assoc()) {
        $prices[$index] = $row['price'];
        $capacity[$index++] = $row['capacity'];
    }

    $photos = array(array(), array(), array());

    $query_string = "SELECT id_room, name from Room_Photo;";

    $result = $connection->query($query_string);

    while ($row = $result->fetch_assoc()) {
        array_push($photos[$row['id_room']-1], $row['name']);
    }

    $connection->close();

?>


<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Noclegi Mudrak - Rooms</title>
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
    
    <link rel="stylesheet" href="../shared/fonts/ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="../shared/fonts/fontawesome/css/font-awesome.min.css">

    <link rel="stylesheet" href="../shared/css/index-rooms.css">

    <script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
  
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
              <a class="nav-link js-scroll-trigger" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">Our Rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="index.php#information">Information</a>
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
    <div class="carousel-item active">
      <img src="../shared/images/outside10.jpg" alt="Room 1" width=100% >
    </div>
    <div class="carousel-item">
      <img src="../shared/images/room2.3.jpeg" alt="Room 2" width=100%>
    </div>
    <div class="carousel-item">
      <img src="../shared/images/room3.3.jpeg" alt="Room 3" width=100%>
    </div>
      <div class="carousel-item">
      <img src="../shared/images/outside1.jpg" alt="Room 4" width=100%>
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
    </div>
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
                  <button class="btn btn-primary btn-block text-white">Check Availabilty</button>
                </div>
              </div>
            </form>
          </div>


        </div>
      </div>
    </section>

		 <!-- room1-->
    <section class="section">
      <div class="container">
         <div class="p-3 text-center room-info">
                <h2>Single Room</h2>
                <span class="text-uppercase letter-spacing-1" style="display: block"><?php echo $prices[0]; ?> zl / per night</span>
                <span class="text-uppercase letter-spacing-1">Capacity: <?php echo $capacity[0] ?> guest</span>
         </div>

         <div class='row'>
         <?php

            for ($index = 0; $index < count($photos[0]); $index++) {
                echo "
                <div class='col-md-6 col-lg-4 mb-5' data-aos='fade-up'>
                  <figure class='img-wrap'>
                   <a href='#'> <img src='../shared/images/" . $photos[0][$index] . "' class='img-fluid mb-3 hover-shadow cursor' style='width: 100%' onclick='openModal();currentSlide(1)' class='hover-shadow' ></a>
                  </figure>
                       </div>
                     
               ";
            }

            ?>
      
      </div>
      </div>

        <!-- room2-->
         <div class="p-3 text-center room-info">
           <h2>3 Beds Room</h2>
           <span class="text-uppercase letter-spacing-1" style="display: block"><?php echo $prices[1]?> zl / per night</span>
           <span class="text-uppercase letter-spacing-1">Capacity: <?php echo $capacity[1] ?> guests</span>
        </div>
        <div class="row">
          <?php

            for ($index = 0; $index < count($photos[1]); $index++) {
                echo "
                <div class='col-md-6 col-lg-4 mb-5' data-aos='fade-up'>
                  <figure class='img-wrap'>
                   <a href='#'> <img src='../shared/images/" . $photos[1][$index] . "' class='img-fluid mb-3 hover-shadow cursor' style='width: 100%' onclick='openModal();currentSlide(1)' class='hover-shadow' ></a>
                  </figure>
                       </div>";
            }

            ?>

      </div>


<!-- room3-->
     <div class="container">
         <div class="p-3 text-center room-info">
                <h2>Family Room</h2>
                <span class="text-uppercase letter-spacing-1" style="display: block;"><?php echo $prices[2]?> zl / per night</span>
                <span class="text-uppercase letter-spacing-1">Capacity: <?php echo $capacity[2] ?> guests</span>
              </div>



        <div class="row">


        <?php

            for ($index = 0; $index < count($photos[2]); $index++) {
                echo "
                <div class='col-md-6 col-lg-4 mb-5' data-aos='fade-up'>
                  <figure class='img-wrap'>
                   <a href='#'> <img src='../shared/images/" . $photos[2][$index] . "' class='img-fluid mb-3 hover-shadow cursor' style='width: 100%' onclick='openModal();currentSlide(1)' class='hover-shadow' ></a>
                  </figure>
                       </div>";
            }

            ?>

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
    
    <!-- lightbox gallery -->


<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

    <div class="mySlides">
      <img src="../shared/images/room1.1.jpeg" style="width:100%">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room2.1.jpeg" style="width:100%; transform:rotate(90deg); min-height: 80vh; object-fit: cover">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room2.2.jpeg" style="width:100%">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room2.3.jpeg" style="width:100%; min-height: 80vh; object-fit: cover">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room3.1.jpg" style="width:100%;  ">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room3.2.jpeg" style="width:100%">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room3.3.jpeg" style="width:100%; min-height: 80vh; object-fit: cover">
    </div>
   
   <div class="mySlides">
      <img src="../shared/images/room3.4.jpeg" style="width:100%; ">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room3.5.jpeg" style="width:auto; max-height: 80vh; margin-left: 50%; transform: translate(-50%,0%);">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room3.6.jpeg" style="width:100%; ">
    </div>

    <div class="mySlides">
      <img src="../shared/images/room3.7.jpg" style="width:100%; ">
    </div>


    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
    <div class="caption-container">
      <p id="caption"></p>
    </div>


<!-- end of gallery-->
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
    <script>
// Open the Modal
function openModal() {
  document.getElementById("myModal").style.display = "block";
}

// Close the Modal
function closeModal() {
  document.getElementById("myModal").style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
</script>
  </body>
</html>
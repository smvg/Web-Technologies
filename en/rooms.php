<?php

    include_once("../include/constants.php");
    include("../include/content.php");

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


    $query_string = "SELECT price, capacity, description_en FROM Rooms;";

    $result = $connection->query($query_string);
    $prices = [];
    $capacity = [];
    $descriptions = [];
    $index = 0;

    while ($row = $result->fetch_assoc()) {
        $prices[$index] = $row['price'];
        $descriptions[$index] = $row['description_en'];
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
    
    <?php echo $include_headers_main ?>

      </head>
      <body>
      <?php echo $navbar_en; ?>
  
    <!-- END head -->
          
<div id="photos" class="carousel slide" data-ride="carousel">

  <!-- The slideshow -->
  <div id="photos" class="carousel-inner">
    <?php

    for ($index = 0; $index < 3; $index++) {
      for ($x = 0; $x < count($photos[$index]); $x++) {
        echo "
        <div class='carousel-item " . (($index+$x == 0) ? "active" : "") . "'>
          <img src='../shared/images/" . $photos[$index][$x] . "' class='carousel-image' >
        </div>
      ";
      }
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

		 <!-- room1-->
    <section class="section">
      <div class="container">
         <div class="p-3 text-center room-info">
                <h2>Single Room</h2>
                <span class="text-uppercase letter-spacing-1" style="display: block"><?php echo $descriptions[0]; ?></span>
                <span class="text-uppercase letter-spacing-1" style="display: block"><?php echo $prices[0]; ?> zl / per night</span>
                <span class="text-uppercase letter-spacing-1">Capacity: <?php echo $capacity[0] ?> guest</span>
         </div>

         <div class='row room-gallery'>
         <?php

            for ($index = 0; $index < count($photos[0]); $index++) {
                echo "
                <div class='col-md-6 col-lg-4 mb-5' data-aos='fade-up'>
                  <figure class='img-wrap'>
                   <a href='#'> <img src='../shared/images/" . $photos[0][$index] . "' class='img-fluid mb-3 hover-shadow cursor' style='width: 25rem; height: 20rem; object-fit: cover;' onclick='openModal();currentSlide(1)' class='hover-shadow' ></a>
                  </figure>
                       </div>
                     
               ";
            }

            ?>
      
      </div>
      </div>

        <!-- room2-->
      <div class="container">
         <div class="p-3 text-center room-info">
           <h2>3 Beds Room</h2>
           <span class="text-uppercase letter-spacing-1" style="display: block"><?php echo $descriptions[1]; ?></span>
           <span class="text-uppercase letter-spacing-1" style="display: block"><?php echo $prices[1]?> zl / per night</span>
           <span class="text-uppercase letter-spacing-1">Capacity: <?php echo $capacity[1] ?> guests</span>
        </div>
        <div class="row room-gallery">
          <?php

            for ($index = 0; $index < count($photos[1]); $index++) {
                echo "
                <div class='col-md-6 col-lg-4 mb-5' data-aos='fade-up'>
                  <figure class='img-wrap'>
                   <a href='#'> <img src='../shared/images/" . $photos[1][$index] . "' class='img-fluid mb-3 hover-shadow cursor' style='width: 25rem; height: 20rem; object-fit: cover;' onclick='openModal();currentSlide(1)' class='hover-shadow' ></a>
                  </figure>
                       </div>";
            }

            ?>

      </div>
</div>


<!-- room3-->
     <div class="container">
         <div class="p-3 text-center room-info">
                <h2>Family Room</h2>
                <span class="text-uppercase letter-spacing-1" style="display: block"><?php echo $descriptions[2]; ?></span>
                <span class="text-uppercase letter-spacing-1" style="display: block;"><?php echo $prices[2]?> zl / per night</span>
                <span class="text-uppercase letter-spacing-1">Capacity: <?php echo $capacity[2] ?> guests</span>
              </div>



        <div class="row room-gallery">


        <?php

            for ($index = 0; $index < count($photos[2]); $index++) {
                echo "
                <div class='col-md-6 col-lg-4 mb-5' data-aos='fade-up'>
                  <figure class='img-wrap'>
                   <a href='#'> <img src='../shared/images/" . $photos[2][$index] . "' class='img-fluid mb-3 hover-shadow cursor' style='width: 25rem; height: 20rem; object-fit: cover;' onclick='openModal();currentSlide(1)' class='hover-shadow' ></a>
                  </figure>
                       </div>";
            }

            ?>

    </div>

    </section>

    
    
    <?php get_footer_en($address, $phone, $email, $flink, $blink); ?>
    
    <!-- lightbox gallery -->


<div id="myModal" class="modal">
  <span class="close cursor" onclick="closeModal()">&times;</span>
  <div class="modal-content">

  <?php

    for ($index = 0; $index < 3; $index++) {
      for ($x = 0; $x < count($photos[$index]); $x++) {
        echo "
          <div class='mySlides'>
            <img src='../shared/images/" . $photos[$index][$x] . "' style='width:100%; object-fit: cover;'>
          </div>
        ";
      }
    }

  ?>


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

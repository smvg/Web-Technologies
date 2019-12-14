
<?php

$host = "localhost";
$user = "root";
$password = "";
$db = "Website";


$db = new mysqli($host, $user, $password, $db) or die("Unable to connect");

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$sql = "SELECT * FROM Location" ;
$result = $db->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) 
	{
			$address = $row["address_location"];
			
			$phone = $row["phone_location"];	
			
			$email = $row["email_location"];	 
    }
    } else
		{
          echo "0 results";
        }
$db->close();

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
            <a class="nav-link js-scroll-trigger" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="rooms.html">Our Rooms</a>
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
                  <button class="btn btn-primary btn-block text-white">Check Availabilty</button>
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

    <section class="section">
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
                <span class="text-uppercase letter-spacing-1">90$ / per night</span>
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
                <span class="text-uppercase letter-spacing-1">120$ / per night</span>
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
                <span class="text-uppercase letter-spacing-1">100$ / per night</span>
              </div>
            </a>
          </div>


        </div>
      </div>
    </section>
  
	
    <section class="section blog-post-entry bg-light">
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
                                <a href="culture.html" class="mb-4 d-block"><h5 class="card-title">Culture</h5>
                                <p class="card-text">There are a couple of cultural activities close by</p></a>
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
                                <a href="nature.html" class="mb-4 d-block"><h5 class="card-title">Nature</h5>
                                <p class="card-text">See here the beautiful nature close by</p></a>
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
                                    <a href="shops.html" class="mb-4 d-block"><h5 class="card-title">Shops</h5>
                                    <p class="card-text">Meet local handicrafts</p></a>
                                    <!--<p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>-->
                                </div>
                            </div>
                        </div>
                </div>
                
            </div>
            <div id="map-container-google-1" class=" rounded z-depth-1-half map-container">
              <iframe frameborder="0" style="border:0" src="https://maps.google.com/maps?q=almeria&t=&z=13&ie=UTF8&iwloc=&output=embed" allowfullscreen></iframe> 
            </div>
    </section>

  <section class="section testimonial-section">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-md-7">
            <h2 class="heading" data-aos="fade-up">Reviews</h2>
          </div>
        </div>
        <div class="row">
          <div class="js-carousel-2 owl-carousel mb-5" data-aos="fade-up" data-aos-delay="200">
            
            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../shared/images/person_1.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; Jean Smith</em></p>
            </div> 

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../shared/images/person_2.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>
                <p>&ldquo;Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../shared/images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>



            <div class="testimonial text-center slider-item">
              <div class="author-image mb-3">
                <img src="../shared/images/person_3.jpg" alt="Image placeholder" class="rounded-circle mx-auto">
              </div>
              <blockquote>

                <p>&ldquo;When she reached the first hills of the Italic Mountains, she had a last view back on the skyline of her hometown Bookmarksgrove, the headline of Alphabet Village and the subline of her own road, the Line Lane.&rdquo;</p>
              </blockquote>
              <p><em>&mdash; John Doe</em></p>
            </div>

          </div>
            <!-- END slider -->
        </div>

      </div>
    </section>

    <footer class="section footer-section">
      <div class="container">
        <div class="row mb-4">
           <div class="col-md-3 mb-5">
            <ul class="list-unstyled link">
              <li><a href="rooms.html">The Rooms</a></li>
              <li><a href="#">Contact Us</a></li>
            </ul>
          </div>
          <div class="col-md-3 mb-5 pr-md-5 contact-info">
            <p><span class="d-block"><span class="ion-ios-location h5 mr-3 text-primary"></span>Address:</span> <span><?php echo $address; ?></span></p>
            <p><span class="d-block"><span class="ion-ios-telephone h5 mr-3 text-primary"></span>Phone:</span> <span><?php echo $phone; ?></span></p>
           <p><span class="d-block"><span class="ion-ios-email h5 mr-3 text-primary"></span>Email:</span> <span><?php echo $email; ?></span></p>
			      <p><span class="d-block"><span class="fa-fa-facebook h5 mr-3 text-primary"></span>Facebook:</span> <span> Noclegi Mudrak</span></p>
			      <p><span class="d-block"><span class="fa-fa-tripadvisor h5 mr-3 text-primary"></span>Tripadvisor:</span> <span> Noclegi Mudrak</span></p>
          </div>
          <div class="col-md-5 mb-5 pr-md-5 contact-info">
            <input type="text" style="margin: 0.5rem; width: 100%; padding: 1rem;" placeholder="Name">
            <input type="email" style="margin: 0.5rem; width: 100%; padding: 1rem;" placeholder="Email">
            <textarea class="rounded" style="margin: 0.5rem; width: 100%; padding: 1rem;" placeholder="Type here"></textarea>
            <button class="btn btn-primary btn-block text-white" style="margin: 0.5rem;">Send</button>
          </div>
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


	<script src="../shared/js/main.js"></script>
	
	</body>
</html>
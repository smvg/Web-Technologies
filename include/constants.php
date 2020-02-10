<?php

    $mysql_host = "localhost";
    $mysql_user = "root";
    $mysql_password = "";
    $mysql_db = "Website";

    $salt = "VjHnacnSDfHPQ7Y";

    $available_languages = array('en', 'pl');

    $booking_search_en = "<section class=\"section bg-light pb-0\">
    <div class=\"container\">

      <div class=\"row check-availabilty\" id=\"next\">
        <div class=\"block-32\" data-aos=\"fade-up\" data-aos-offset=\"-200\">

          <form action=\"#\">
            <div class=\"row\">
              <div class=\"col-md-6 mb-3 mb-lg-0 col-lg-3\">
                <label for=\"checkin_date\" class=\"font-weight-bold text-black\">Check In</label>
                <div class=\"field-icon-wrap\">
                  <div class=\"icon\"><span class=\"icon-calendar\"></span></div>
                  <input type=\"text\" id=\"checkin_date\" class=\"form-control\">
                </div>
              </div>
              <div class=\"col-md-6 mb-3 mb-lg-0 col-lg-3\">
                <label for=\"checkout_date\" class=\"font-weight-bold text-black\">Check Out</label>
                <div class=\"field-icon-wrap\">
                  <div class=\"icon\"><span class=\"icon-calendar\"></span></div>
                  <input type=\"text\" id=\"checkout_date\" class=\"form-control\">
                </div>
              </div>
              <div class=\"col-md-6 mb-3 mb-md-0 col-lg-3\">
                <div class=\"row\">
                  <div class=\"col-md-6 mb-3 mb-md-0\">
                    <label for=\"adults\" class=\"font-weight-bold text-black\">Persons</label>
                    <div class=\"field-icon-wrap\">
                      <div class=\"icon\"><span class=\"ion-ios-arrow-down\"></span></div>
                      <select name=\"\" id=\"adults\" class=\"form-control\">
                        <option value=\"\">1</option>
                        <option value=\"\">2</option>
                        <option value=\"\">3</option>
                        <option value=\"\">4</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
              <div class=\"col-md-6 col-lg-3 align-self-end\">
                <button id=\"check-availabilty-btn\" class=\"btn btn-primary btn-block text-white\">Check Availabilty</button>
              </div>
            </div>
          </form>
        </div>


      </div>
    </div>
  </section>";


    $booking_search_pl = "<section class=\"section bg-light pb-0\" >
    <div class=\"container\">
     
      <div class=\"row check-availabilty\" id=\"next\">
        <div class=\"block-32\" data-aos=\"fade-up\" data-aos-offset=\"-200\">

          <form action=\"#\">
            <div class=\"row\">
              <div class=\"col-md-6 mb-3 mb-lg-0 col-lg-3\">
                <label for=\"checkin_date\" class=\"font-weight-bold text-black\">Zameldowanie</label>
                <div class=\"field-icon-wrap\">
                  <div class=\"icon\"><span class=\"icon-calendar\"></span></div>
                  <input label=\"Checkin Date\" type=\"text\" id=\"checkin_date\" class=\"form-control\">
                </div>
              </div>
              <div class=\"col-md-6 mb-3 mb-lg-0 col-lg-3\">
                <label for=\"checkout_date\" class=\"font-weight-bold text-black\">Wymeldowanie</label>
                <div class=\"field-icon-wrap\">
                  <div class=\"icon\"><span class=\"icon-calendar\"></span></div>
                  <input label=\"Checkout Date\" type=\"text\" id=\"checkout_date\" class=\"form-control\">
                </div>
              </div>
              <div class=\"col-md-6 mb-3 mb-md-0 col-lg-3\">
                <div class=\"row\">
                  <div class=\"col-md-6 mb-3 mb-md-0\">
                    <label for=\"adults\" class=\"font-weight-bold text-black\">Osoby</label>
                    <div class=\"field-icon-wrap\">
                      <div class=\"icon\"><span class=\"ion-ios-arrow-down\"></span></div>
                      <select name=\"\" id=\"adults\" class=\"form-control\">
                        <option value=\"\">1</option>
                        <option value=\"\">2</option>
                        <option value=\"\">3</option>
                        <option value=\"\">4</option>
                      </select>
                    </div>
          </div>
                </div>
              </div>
              <div class=\"col-md-6 col-lg-3 align-self-end\">
                <button id=\"check-availabilty-btn\" class=\"btn btn-primary btn-block text-white\">Sprawdź dostępność</button>
              </div>
            </div>
          </form>
        </div>


      </div>
    </div>
  </section>";

    $include_headers_main = "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <meta name=\"description\" content=\"\" />
    <meta name=\"keywords\" content=\"\" />
    <meta name=\"author\" content=\"\" />
    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700\">
  
    <link rel=\"stylesheet\" href=\"../shared/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/animate.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/owl.carousel.min.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/aos.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/bootstrap-datepicker.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/jquery.timepicker.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/fancybox.min.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/_custom.css\">
    <link rel=\"stylesheet\" href=\"../shared/fonts/ionicons/css/ionicons.min.css\">
    <link rel=\"stylesheet\" href=\"../shared/fonts/fontawesome/css/font-awesome.min.css\">
  
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src=\"https://unpkg.com/leaflet@1.3.4/dist/leaflet.js\" integrity=\"sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==\" crossorigin=\"\"></script>
  
    <!-- Flags -->
    <link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/0.8.2/css/flag-icon.min.css\">

    <link rel=\"stylesheet\" href=\"../shared/css/index-rooms.css\">
  
    <!-- Theme Style -->
    <link rel=\"stylesheet\" href=\"../shared/css/style.css\">";

    $include_headers_admin = "<!-- Required meta tags -->
    <meta charset=\"utf-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
  
    <!-- External CSS -->
    <link rel=\"stylesheet\" type=\"text/css\" href=\"//fonts.googleapis.com/css?family=|Roboto+Sans:400,700|Playfair+Display:400,700\">
  
    <link rel=\"stylesheet\" href=\"../shared/css/bootstrap.min.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/animate.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/owl.carousel.min.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/aos.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/bootstrap-datepicker.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/jquery.timepicker.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/fancybox.min.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/_custom.css\">
    <link rel=\"stylesheet\" href=\"../shared/fonts/ionicons/css/ionicons.min.css\">
    <link rel=\"stylesheet\" href=\"../shared/fonts/fontawesome/css/font-awesome.min.css\">
  
    <!-- Make sure you put this AFTER Leaflet's CSS -->
    <script src=\"https://unpkg.com/leaflet@1.3.4/dist/leaflet.js\" integrity=\"sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA==\" crossorigin=\"\"></script>
  
    <!-- Theme Style -->
    <link rel=\"stylesheet\" href=\"../shared/css/style.css\">
  
    <link rel=\"stylesheet\" href=\"../shared/css/admin.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/table.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/accounts.css\">
    <link rel=\"stylesheet\" href=\"../shared/css/rooms.css\">
    <link rel='stylesheet' href=\"../shared/css/forms.css\">
  
    <script src=\"../shared/js/jquery-3.3.1.min.js\"></script>
  
    <script src=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js\"></script>
  
    <script src=\"../shared/js/jquery-redirect.js\"></script>
  
    <script src=\"../shared/js/hammer.js\"></script>
  
    <script src=\"../shared/js/admin.js\"></script>";

    $navbar_en = "<nav class=\"navbar navbar-expand-lg navbar-dark fixed-top\" id=\"mainNav\">
    <div class=\"container\">
      <a class=\"navbar-brand js-scroll-trigger\" href=\"#page-top\">Noclegi Mudrak</a>
      <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
        Menu
        <i class=\"fa fa-bars\"></i>
      </button>
      <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
        <ul class=\"navbar-nav text-uppercase ml-auto\">
          <li class=\"nav-item\">
            <a id=\"home-anchor\" class=\"nav-link js-scroll-trigger\" href=\"#\">Home</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link js-scroll-trigger\" href=\"#rooms\">Our Rooms</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link js-scroll-trigger\" href=\"#information\">Location</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link js-scroll-trigger\" href=\"#contact\">Contact</a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\" id=\"select-en\"><i class=\"flag-icon flag-icon-us\"></i></a>
          </li>
          <li class=\"nav-item\">
            <a class=\"nav-link\" href=\"#\" id=\"select-pl\"><i class=\"flag-icon flag-icon-pl\"></i></a>
          </li>
        </ul>
      </div>
    </div>
      </nav>";
      
    $navbar_pl = "<nav class=\"navbar navbar-expand-lg navbar-dark fixed-top\" id=\"mainNav\">
      <div class=\"container\">
        <a class=\"navbar-brand js-scroll-trigger\" href=\"#page-top\">Noclegi Mudrak</a>
        <button class=\"navbar-toggler navbar-toggler-right\" type=\"button\" data-toggle=\"collapse\" data-target=\"#navbarResponsive\" aria-controls=\"navbarResponsive\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
          Menu
          <i class=\"fa fa-bars\"></i>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarResponsive\">
          <ul class=\"navbar-nav text-uppercase ml-auto\">
            <li class=\"nav-item\">
              <a id=\"home-anchor\" class=\"nav-link js-scroll-trigger\" href=\"#\">Home</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link js-scroll-trigger\" href=\"#rooms\">Pokoje</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link js-scroll-trigger\" href=\"#information\">Lokalizacja</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link js-scroll-trigger\" href=\"#contact\">Kontakt</a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#\" id=\"select-en\"><i class=\"flag-icon flag-icon-us\"></i></a>
            </li>
            <li class=\"nav-item\">
              <a class=\"nav-link\" href=\"#\" id=\"select-pl\"><i class=\"flag-icon flag-icon-pl\"></i></a>
            </li>
          </ul>
        </div>
      </div>
        </nav>";

?>

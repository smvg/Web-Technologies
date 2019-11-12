<!doctype html>
<?php
  require_once("../include/content.php");
?>
<html lang="en">
  <head>
    <title>Administrator's Website</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- External CSS -->
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

    <link rel="stylesheet" href="../shared/css/admin.css">

    <script src="../shared/js/jquery-3.3.1.min.js"></script>

    <script src="../shared/js/jquery-redirect.js"></script>

    <script src="../shared/js/admin.js"></script>


  </head>
  <body>

      <div class="sidebar">
          <div id="logo-sidebar">
            <span style="letter-spacing: 10px;"><h1>LOGO</h1></span>
          </div>
          <hr style="border-color: white;">
          <ul class="nav">
              <li class="active">
                  <a href="javascript:change_view('dashboard')" onclick="make_content_visible('dashboard')">
                      <p>
                        <i class="fa fa-home" aria-hidden="true"></i>
                        &nbsp;
                        DASHBOARD
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('accounts')">
                      <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        &nbsp;
                        ACCOUNTS
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('rooms')">
                      <p>
                        <i class="fa fa-key" aria-hidden="true"></i>
                        &nbsp;
                        ROOMS
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('location')">
                      <p>
                        <i class="fa fa-map" aria-hidden="true"></i>
                        &nbsp;
                        LOCATION
                      </p>
                  </a>
              </li>
          </ul>
      </div>

      <?php 
        $view = $_POST['page'];

        if (!isset($view)) {
          echo $dashboard;
          return;
        }

        switch($view) {
          case 'dashboard':
            echo $dashboard;
            break;
          case 'rooms':
            echo $rooms;
            break;
          case 'accounts':
            echo $accounts;
            break;
          case 'location':
            echo $location;
            break;
          case 'room-edit':
            echo $room_edit;
            break;
          default;
            echo "Page not found :(";
            break;
        };
      ?>
  </body>
</html>

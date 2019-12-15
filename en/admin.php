<?php
  #require_once("../include/content.php");

  include("../include/content.php");
  include("../include/actions.php");
  include("../include/constants.php");

  session_start();

  function go_back_to_login() {
    ob_start();
    header('Location: login.html');
    ob_end_flush();
    die();
  }

  # If session variables are not set
  if (!(isset($_SESSION['email']) && isset($_SESSION['psswd']))) {

    # If didn't receive information from post
    if (!(isset($_POST['email']) && isset($_POST['psswd']))){
      go_back_to_login();
    }


    $email = $_POST['email'];
    $password = $_POST['psswd'];

    # Are variables empty
    if (empty($email) || empty($password)) go_back_to_login();

    # Establish connection
    $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

    # What if it doesnt work
    if ($connection->connect_error){
        echo "Connection to database failed :(";
    }

    $query_string = "SELECT * FROM Administrators
                    where email = '" . $email . "';";

    $result = $connection->query($query_string);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['password'] != hash("sha256", $password.$salt)) {
          go_back_to_login();
        }
        $_SESSION['email'] = $email;
        $_SESSION['psswd'] = $password;
        $_SESSION['first_name'] = $row['first_name'];
        $_SESSION['last_name'] = $row['last_name'];
    }
    else {
        go_back_to_login();
    }

    $connection->close();

  }

?>
<!doctype html>
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
    <link rel="stylesheet" href="../shared/css/table.css">
    <link rel="stylesheet" href="../shared/css/accounts.css">
    <link rel="stylesheet" href="../shared/css/rooms.css">
    <link rel='stylesheet' href="../shared/css/forms.css">

    <script src="../shared/js/jquery-3.3.1.min.js"></script>

    <script src="../shared/js/jquery-redirect.js"></script>

    <script src="../shared/js/admin.js"></script>

  </head>
  <body>

      <div class="sidebar">
          <div id="logo-sidebar">
            <span style="letter-spacing: 10px;"><h1 style="color: white">NM</h1></span>
          </div>
          <hr style="border-color: white;">
          <ul class="nav">
              <li class="active">
                  <a href="javascript:change_view('dashboard')" onclick="make_content_visible('dashboard')">
                      <p>
                        <i class="fa fa-home" aria-hidden="true"></i>
                        &nbsp;
                        <span class="icon-description">DASHBOARD</span>
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('accounts')">
                      <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        &nbsp;
                        <span class="icon-description">ACCOUNTS</span>
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('rooms')">
                      <p>
                        <i class="fa fa-key" aria-hidden="true"></i>
                        &nbsp;
                        <span class="icon-description">ROOMS</span>
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('location')">
                      <p>
                        <i class="fa fa-info-circle"></i></i>
                        &nbsp;
                        <span class="icon-description">INFO & LINKS</span>
                      </p>
                  </a>
              </li>
          </ul>
      </div>

      <?php 
        $view = (isset($_POST['page'])) ? $_POST['page'] : '';
        $action = (isset($_POST['action'])) ? $_POST['action'] : '';

        switch($action) {
          case 'add-account':
            add_account();
            break;
          case 'update-account':
            edit_account();
            break;
          case 'delete-account':
            delete_account();
            break;
          case 'update-room':
            $view = "rooms";
            edit_room();
            break;
          case 'update-location':
            edit_location();
            break;
        }

        switch($view) {
          case 'dashboard':
            //echo $dashboard;
            get_dashboard();
            break;
          case 'rooms':
            list_rooms();
            break;
          case 'accounts':
            list_accounts();
            break;
          case 'location':
            get_location();
            break;
          case 'room-edit':
            view_room($_POST['id_room']);
            echo "<script>window.current_room = " . $_POST['id_room'] . ";</script>";
            break;
          case 'links':
            break;
          default;
            get_dashboard();
            break;
        };
      ?>
  </body>
</html>

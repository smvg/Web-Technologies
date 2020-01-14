<?php
  #require_once("../include/content.php");

  include("../include/content.php");
  include("../include/actions.php");
  require_once("../include/constants.php");

  session_start();

  function go_back_to_login() {
    ob_start();
    header('Location: login.html');
    ob_end_flush();
    die();
  }

  if (isset($_GET['logout']) && $_GET['logout'] == true) {
    session_destroy();
    go_back_to_login();
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
/*
  if (!(isset($_SESSION['last_activity']))) {
    $_SESSION['last_activity'] = time();
  }

  if ($_SESSION['last_activity'] < time()-(5*60)) {
    session_destroy();
    go_back_to_login();
  }

  $_SESSION['last_activity'] = time();*/

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Administrator's Website</title>
    <?php echo $include_headers_admin; ?>
  </head>
  <body>
      <div id="collapse" class="rounded">
        <i class="fa fa-bars" aria-hidden="true"></i>
      </div>
      <div id="sidebar-admin" class="sidebar">
          <div id="logo-sidebar">
            <span id='title'><h1>NM</h1></span>
          </div>
          <div style='align-content: center; text-align: center; color: white'>
            <span><a href='admin.php?logout=true' style="color: white"><i class="fa fa-sign-out"></i><span class='icon-description'>&nbsp;Log out</span></a></span>
          </div>
          <hr style="border-color: white;">
          <ul class="nav">
              <li class="active">
                  <a href="javascript:change_view('dashboard')" onclick="make_content_visible('dashboard')">
                      <p>
                        <i class="fa fa-home" aria-hidden="true"></i>
                        <span class="icon-description">&nbsp;DASHBOARD</span>
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('accounts')">
                      <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="icon-description">&nbsp;ACCOUNTS</span>
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('rooms')">
                      <p>
                        <i class="fa fa-th-large" aria-hidden="true"></i>
                        <span class="icon-description">&nbsp;ROOMS</span>
                      </p>
                  </a>
              </li>
              <li>
                  <a href="javascript:change_view('location')">
                      <p>
                        <i class="fa fa-info-circle"></i></i>
                        <span class="icon-description">&nbsp;INFO & LINKS</span>
                      </p>
                  </a>
              </li>
          </ul>
      </div>
          
      <!-- Modal -->
<div id='modal-edit' class="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Edit Account</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div id='input-div' class='animated fadeIn' style='display: flex; flex-wrap: wrap;'>
        <div>
          <i class='fa fa-envelope-o input-description' aria-hidden='true'></i>
          <input id='edit-email-modal' style='width: 80%' autocomplete='new-password' type='email' placeholder='Email'>
        </div>
        <div>
          <i class='fa fa-key' aria-hidden='true'></i>
          <input id='edit-psswd-modal' style='width: 80%' autocomplete='new-password' type='password' placeholder='Password'>
        </div>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button id='update-account-modal' type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
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
      </div>
  </body>
</html>

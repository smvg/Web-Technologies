<?php


    function get_dashboard() {
        echo "<div id='dashboard' class='content'>
        <div>
          <h1>Hi " . $_SESSION['first_name'] . " " . $_SESSION['last_name'] . "</h1>
          <hr>
          <div class='content-div animated fadeInUp'>
            <div class='card' style='width: 15rem;'>
                <img src='../shared/images/accounts.png' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Accounts</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href=\"javascript:change_view('accounts')\" class='btn btn-primary'>Edit Accounts</a>
                </div>
            </div>
            <div class='card' style='width: 15rem;'>
                <img src='../shared/images/outside1.jpg' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Rooms</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href=\"javascript:change_view('rooms')\" class='btn btn-primary'>Edit Rooms</a>
                </div>
            </div>
            <div class='card' style='width: 15rem;'>
                <img src='https://www.vertical-leap.uk/wp-content/uploads/2017/11/map-1400x800.jpg' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Location</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href=\"javascript:change_view('location')\" class='btn btn-primary'>Edit Location</a>
                </div>
            </div>
          </div>
        </div>
      </div>";
    }

    function list_accounts() {
      include("constants.php");

      $static_code = "<div id='accounts' class='content animated fadeInUp'>
      <h1>Accounts</h1>
      <hr style='width:100%'>
      <div id='account-table' class='content-table'>
      <div class='header-cell'>
      <div class='row-header-del'>
          #
      </div>
      <div class='row-header-email'>
          Email
      </div>
      <div class='row-header-password'>
          Password
      </div>
      <div class='row-header-operation'>
          
      </div></div>  
          ";
      
          $table = "";
          $end_code = "</div>";
      
        $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

        # What if it doesnt work
        if ($connection->connect_error){
            echo "Connection to database failed :(";
        }
      
        $query_string = "SELECT * FROM Administrators;";
      
        $result = $connection->query($query_string);

        $connection->close();

        while ($row = mysqli_fetch_assoc($result)) {
          $table .= "<div class='cell'>
          <div class='row-data-del'>
            <i class='fa fa-times delete' aria-hidden='true'></i>
          </div>
          <div class='row-data-email'>
              ". $row['email'] . "
          </div>
          <div class='row-data-password'>
              *****
          </div>
          <div class='row-data-operation'>
              <a href='#' style='margin:auto; display:inline-block;' class='btn btn-secondary edit-account'>Edit</a>
          </div>
          </div>";
        }

      echo $static_code . $table . $end_code;
    }

    function list_rooms() {
      include("constants.php");


      $static_code = "<div id='rooms' class='content animated fadeInUp'>
      <h1>Rooms</h1>
      <hr style='width:100%'>
      <div id='room-table' class='content-table'>
      <div class='header-cell'>
      <div class='row-header-num'>
          #
      </div>
      <div class='row-header-description'>
          Description
      </div>
      <div class='row-header-capacity'>
          Capacity
      </div>
      <div class='row-header-photos'>
          Nº Photos
      </div>
      <div class='row-header-visible'>
          Visible
      </div></div>";

      $table = "";
      $end_code = "</tbody></table></div>";

      $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

      # What if it doesnt work
      if ($connection->connect_error){
          echo "Connection to database failed :(";
      }
      
      $query_string = "SELECT * FROM Rooms;";
      
      $result = $connection->query($query_string);

      $connection->close();

      while ($row = mysqli_fetch_assoc($result)) {
        $table .= "
        <div id='room-" . $row['id_room'] . "' class='cell clickable room-entry'>
      <div class='row-data-num'>"
      . $row['id_room'] .
      "</div>
      <div class='row-data-description'>"
      . $row['description'] .
      "</div>
      <div class='row-data-capacity'>"
      . $row['capacity'] . 
      "</div>
      <div class='row-data-photos'>
      1
      </div>
      <div class='row-data-visible'>
      <i class='fa fa-check' aria-hidden='true'></i>
      </div></div>
        ";
      }

      echo $static_code . $table . $end_code;

    }

    function view_room($id) {
      include('constants.php');

      $code = "";
      $photos_code = "";

      $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

      # What if it doesnt work
      if ($connection->connect_error){
          echo "Connection to database failed :(";
      }
      
      $query_string = "SELECT * FROM Rooms WHERE id_room = '" . $id . "';";
      $result = $connection->query($query_string);
      

      $query_string = "SELECT * FROM Room_Photo WHERE id_room = '" . $id . "';";
      $photos = $connection->query($query_string);

      $connection->close();

      while ($row = mysqli_fetch_assoc($photos)) {
        $photos_code .= "<div class='rounded photo-entry' style='background-image: url(\"../shared/images/" . $row['name'] . "\"); background-size: cover'>
          <i class='fa fa-times delete' aria-hidden='true' style='position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%)'></i>
        </div>";
      }

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $code = "
        <div id='room-edit' class='content animated fadeInUp'>
          <h1>Room #" . $row['id_room'] . "</h1>
          <hr>

          <form id='input-div' enctype='multipart/form-data' action='admin.php' method='post'>
            <input name='capacity' type=\"number\" value='" . $row['capacity'] . "' placeholder=\"Capacity\">
            <br>
            <textarea name='description' class=\"rounded\" placeholder=\"Description\">" . $row['description'] . "</textarea>
            <br>
            <div class='photo-div'>" . $photos_code . "</div>
            <input id='fileInput' type='file' name='pic' style=\"width: auto;\" accept='image/*'>
            <br>
            <input name='visible' style=\"margin-left: 1rem; margin-right: 0.5rem; width: auto;\" type=\"checkbox\" value=\"visible\" checked> Visible
            <input type='number' name='id_room' value='" . $row['id_room'] . "' style='display:none'>
            <input type='text' name='action' value='update-room' style='display:none'>
            <input type='submit' value='Save' class=\"btn btn-primary btn-block text-white\" style=\"margin: 0.5rem; width: auto; padding-left: 1.5rem; padding-right: 1.5rem\">
          </form>
          
          </div>
        </div>
        ";
      }

      echo $code;
    }
?>
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

      $static_code = "<div id='accounts' class='content'>
      <h1>Accounts</h1>
      <hr>
      <div class='input-section animated fadeIn'>
        <input id='add-email' type='email' placeholder='Email'>
        <input id='add-psswd' type='password' placeholder='Password'>
        <button id='add-account' class='btn btn-primary'>Add</button>
      </div>
      <div class='content-div animated fadeInUp'>
          <table class='table table-borderless'>
              <thead class='thead-light'>
              <tr>
              <th scope='col'>#</th>
              <th scope='col'>Email</th>
              <th scope='col'>Password</th>
              <th scope='col'></th>
            </tr>
          </thead><tbody>";
      
          $table = "";
          $end_code = "</tbody></table></div></div>";
      
        $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

        # What if it doesnt work
        if ($connection->connect_error){
            echo "Connection to database failed :(";
        }
      
        $query_string = "SELECT * FROM Administrators;";
      
        $result = $connection->query($query_string);

        $connection->close();

        while ($row = mysqli_fetch_assoc($result)) {
          $table .= "<tr>
                    <th scope='row'><i class='fa fa-times delete' aria-hidden='true'></i></th>
                    <td class='email-table'>" . $row['email'] . "</td>
                    <td class='psswd-table'>*****</td>
                    <td><a href='#' class='btn btn-secondary edit-account'>Edit</a></td></tr>";
        }
        /*
            <tr id='display-1'>
                <th scope='row'>
                <td id='email-1'>mark@email.com</td>
                <td id='password-1'>********</td>
                <td id='button-1'><a href='#' class='btn btn-secondary' onclick='swap_on_edit(1)'>Edit</a></td>
              </tr>*/
      echo $static_code . $table . $end_code;
    }

    function list_rooms() {
      include("constants.php");

      $static_code = "<div id='rooms' class='content animated fadeInUp'>
      <h1>Rooms</h1>
      <hr>
          <table class='table table-hover table-borderless'>
          <thead class='thead-light'>
          <tr>
            <th scope='col'>#</th>
            <th scope='col'>Description</th>
            <th scope='col'>Capacity</th>
            <th scope='col'>Nº Photos</th>
            <th scope='col'>Visible</th>
          </tr>
        </thead>
        <tbody id='table-rooms'>";

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
        $table .= "<tr id='room-" . $row['id_room'] . "' class='room-entry'>
          <th scope='row'>" . $row['id_room'] . "</th>
          <td>" . $row['description'] . "</td>
          <td>" . $row['capacity'] . "</td>
          <td>1</td>
          <td><i class='fa fa-check' aria-hidden='true'></i></td>
        </tr>";
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
        $photos_code .= "<img class='rounded' src=\"../shared/images/" . $row['name'] . "\" style=\"margin: 0.5rem; width: 50px; height: 50px;\">";
      }

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $code = "
        <div id='room-edit' class='content animated fadeInUp'>
          <h1>Room #" . $row['id_room'] . "</h1>
          <hr>
          <div id=\"input-div\">
            <input type=\"number\" value='" . $row['capacity'] . "' placeholder=\"Capacity\">
            <textarea class=\"rounded\" placeholder=\"Description\">" . $row['description'] . "</textarea>
          </div>
          <div>" . $photos_code . 
          "<br>
          <input type='file' name='pic' style=\"margin: 0.5rem; width: auto;\" accept='image/*'>
          <br><input style=\"margin-left: 1rem; margin-right: 0.5rem; width: auto;\" type=\"checkbox\" value=\"visible\"> Visible
          <button class=\"btn btn-primary btn-block text-white\" style=\"margin: 0.5rem; width: auto;\">Save</button>
          </div>
        </div>
        ";
      }

      echo $code;
    }
?>
<?php

    function get_footer_en($address, $phone, $email, $flink, $blink) {
      echo "<footer id=\"contact\" class=\"section footer-section\">
      <div class=\"container\">
        <div class=\"row mb-4\">
           <div class=\"col-md-3 mb-5\">
            <ul class=\"list-unstyled link\">
              <li><a href=\"rooms.html\">The Rooms</a></li>
              <li><a href=\"#\">Contact Us</a></li>
            </ul>
          </div>
          <div class=\"col-md-3 mb-5 pr-md-5 contact-info\">
            <p><span class=\"d-block\"><span class=\"ion-ios-location h5 mr-3 text-primary\"></span>Address:</span> <span>" . $address . "</span></p>
            <p><span class=\"d-block\"><span class=\"ion-ios-telephone h5 mr-3 text-primary\"></span>Phone:</span> <span>" . $phone . "</span></p>
            <p><span class=\"d-block\"><span class=\"ion-ios-email h5 mr-3 text-primary\"></span>Email:</span> <span>" . $email . "</span></p>
                  <p><span class=\"d-block\"><span class=\"fa fa-facebook h5 mr-3 text-primary\"></span>Facebook:</span> <span>" . $flink . "</span></p>
                  <p><span class=\"d-block\"><span class=\"fa fa-link h5 mr-3 text-primary\"></span>Booking:</span> <span>" . $blink . "</span></p>
          </div>
          <form class=\"col-md-5 mb-5 pr-md-5 contact-info\" action=\"../include/send_mail.php\" method=\"post\">
            <input label=\"Your Name\" name=\"name\" type=\"text\" style=\"margin: 0.5rem; width: 100%; padding: 1rem;\" placeholder=\"Name\">
            <input label=\"Your Email\" name=\"email\" type=\"email\" style=\"margin: 0.5rem; width: 100%; padding: 1rem;\" placeholder=\"Email\">
            <textarea label=\"Your Message\" name=\"text\" class=\"rounded\" style=\"margin: 0.5rem; width: 100%; padding: 1rem;\" placeholder=\"Type here\"></textarea>
            <input type=\"submit\" value=\"Send\" class=\"btn btn-primary btn-block text-white\" style=\"margin: 0.5rem;\">
          </form>
        </div>
        <div id='copyright'>
          Copyright © 1996–2020 Noclegi Mudrak. All rights reserved.
        </div>
      </div>
    </footer>";
    }

    function get_footer_pl($address, $phone, $email, $flink, $blink) {
      echo "<footer id=\"contact\" class=\"section footer-section\">
      <div class=\"container\">
        <div class=\"row mb-4\">
           <div class=\"col-md-3 mb-5\">
            <ul class=\"list-unstyled link\">
              <li><a href=\"rooms.html\">The Rooms</a></li>
              <li><a href=\"#\">Contact Us</a></li>
            </ul>
          </div>
          <div class=\"col-md-3 mb-5 pr-md-5 contact-info\">
            <p><span class=\"d-block\"><span class=\"ion-ios-location h5 mr-3 text-primary\"></span>Adres:</span> <span>" . $address . "</span></p>
            <p><span class=\"d-block\"><span class=\"ion-ios-telephone h5 mr-3 text-primary\"></span>Tel:</span> <span>" . $phone . "</span></p>
            <p><span class=\"d-block\"><span class=\"ion-ios-email h5 mr-3 text-primary\"></span>Email:</span> <span>" . $email . "</span></p>
			      <p><span class=\"d-block\"><span class=\"fa fa-facebook h5 mr-3 text-primary\"></span>Facebook:</span> <span>" . $flink . "</span></p>
			      <p><span class=\"d-block\"><span class=\"fa fa-link h5 mr-3 text-primary\"></span>Booking:</span> <span>" . $blink . "</span></p>
          </div>
          <form class=\"col-md-5 mb-5 pr-md-5 contact-info\" action=\"../include/send_mail.php\" method=\"post\">
            <input label=\"Your Name\" name=\"name\" type=\"text\" style=\"margin: 0.5rem; width: 100%; padding: 1rem;\" placeholder=\"Imię\">
            <input label=\"Your Email\" name=\"email\" type=\"email\" style=\"margin: 0.5rem; width: 100%; padding: 1rem;\" placeholder=\"Email\">
            <textarea label=\"Your Message\" name=\"text\" class=\"rounded\" style=\"margin: 0.5rem; width: 100%; padding: 1rem;\" placeholder=\"Wiadomość\"></textarea>
            <input type=\"submit\" value=\"Wyślij\" class=\"btn btn-primary btn-block text-white\" style=\"margin: 0.5rem;\">
          </form>
        </div>
        <div id='copyright'>
          Copyright © 1996–2020 Noclegi Mudrak. All rights reserved.
        </div>
      </div>
    
    </footer>";
    }

    function get_dashboard() {
        echo "<div id='dashboard' class='content'>
          <h1>Dashboard</h1>
          <hr style='width:100%'>
          <div class='content-div animated fadeInUp'>
            <div style='margin: 1rem'>
            <div class='card' style='width: 15rem;'>
                <img src='../shared/images/accounts.png' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Accounts</h5>
                  <p class='card-text'>Manage administrators accounts. <span style='font-weight: bold'>Add new</span> accounts, <span style='font-weight: bold'>edit</span> existing ones and <span style='font-weight: bold'>delete</span> the ones you don't use anymore.</p>
                  <a href=\"javascript:change_view('accounts')\" class='btn btn-primary'>Edit Accounts</a>
                </div>
            </div>
            </div>
            <div style='margin: 1rem'>
            <div class='card' style='width: 15rem;'>
                <img src='../shared/images/outside-default.jpg' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Rooms</h5>
                  <p class='card-text'>Manage existing rooms. Edit the capacity, price and description. You can also upload new photos and delete existing ones.</p>
                  <a href=\"javascript:change_view('rooms')\" class='btn btn-primary'>Edit Rooms</a>
                </div>
            </div>
            </div>
            <div style='margin: 1rem'>
            <div class='card' style='width: 15rem;'>
                <img src='https://www.vertical-leap.uk/wp-content/uploads/2017/11/map-1400x800.jpg' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Info & Links</h5>
                  <p class='card-text'>Edit all the information & links that appear in the main website: Email, the Address, Phone and Facebook and Booking links.</p>
                  <a href=\"javascript:change_view('location')\" class='btn btn-primary'>Edit Info & Links</a>
                </div>
            </div>
            </div>
          </div>
      </div>";
    }

    function get_location() {
      include("constants.php");

      $code = "";
      $photos_code = "";

      $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

      # What if it doesnt work
      if ($connection->connect_error){
          echo "Connection to database failed :(";
      }
      
      $query_string = "SELECT * FROM Location WHERE id_location = 1;";
      $result = $connection->query($query_string);
      

      $query_string = "SELECT * FROM Location_Photo WHERE id_location = 1;";
      $photos = $connection->query($query_string);

      $connection->close();

      $index = 0;

      while ($row = mysqli_fetch_assoc($photos)) {
        $photos_code .= "<div class='rounded photo-entry' style='background-image: url(\"../shared/images/50x50/" . $row['name'] . "\"); background-size: cover'>
        <i class='fa fa-circle fa-stack-2x icon-background' style='position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); visibility: hidden'></i>
        <i class='fa fa-times delete rounded' aria-hidden='true' style='position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); visibility: hidden; color: white'></i>
        <input name='existing-photo[" . $row['name'] . "]' style='display: none' type='checkbox'>
      </div>";
      }

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $code = "
        <div id='location' class='content animated fadeInUp'>
    
        <h1>Info & Links</h1>
        <hr style='width:100%'>
        <form id='input-div' enctype='multipart/form-data' action='admin.php' method='post'>
          <h5>Address & Phone</h5>
          <div style='display: flex; flex-wrap: wrap'>
            <div style='width: 25rem'>
              <i class='fa fa-map-marker input-description' aria-hidden='true'></i>
              <input name='address' style='width: 80%' type=\"text\" placeholder=\"Address\" value='" . $row['address_location'] . "'\>
            </div>
            <div>
              <i class='fa fa-phone input-description' aria-hidden='true'></i>
              <input name='tel' type=\"tel\"  placeholder=\"Phone Number\" value='" . $row['phone_location'] . "' pattern=\"[0-9]{3}-[0-9]{2}-[0-9]{2}-[0-9]{2}\">
            </div>
          </div>
          <br><br>
          <h5>Email & Links</h5>
          <div style='display: flex; flex-wrap: wrap'>
            <div style='width: 25rem'>
              <i class='fa fa-envelope-o input-description' aria-hidden='true'></i>
              <input name='email' style='width: 80%' type=\"text\" placeholder=\"Email Address\" value='" . $row['email_location'] . "'\>
            </div>
            <div>
              <i class='fa fa-facebook input-description' aria-hidden='true'></i>
              <input name='flink' type=\"text\" placeholder=\"Facebook Link\" value='" . $row['facebook_link'] . "'\>
            </div>
            <div>
              <i class='fa fa-link input-description' aria-hidden='true'></i>
              <input name='blink' type=\"text\" placeholder=\"Booking Link\" value='" . $row['booking_link'] . "'\>
            </div>
          </div>
          <br>
        <input type='text' name='action' value='update-location' style='display:none'>
        <div style='display: flex; width: 100%; justify-content: space-between'>
        <div>
            <div class='photo-div'>" . $photos_code . "</div>
        </div>
        <div style='display: block; justify-content: flex-end;'>
            <input type='submit' value='Save' class=\"btn btn-primary btn-block text-white\" style=\"margin: 0.5rem; width: auto; padding-left: 1.5rem; padding-right: 1.5rem\">
        </div>
        </div>
        <input type='file' name='pics[]' style=\"margin: 0.5rem; width: auto;\" accept='image/*' multiple>
        </form>
        ";
      }

      echo $code;

    }

    function list_accounts() {
      include("constants.php");

      $static_code = "<div id='accounts' class='content animated fadeInUp'>
      <h1>Accounts</h1>
      <hr style='width:100%'>
      <div id='input-div' class='animated fadeIn' style='display: flex; flex-wrap: wrap;'>
        <div>
          <i class='fa fa-envelope-o input-description' aria-hidden='true'></i>
          <input id='add-email' style='width: 80%' autocomplete='new-password' type='email' placeholder='Email'>
        </div>
        <div>
          <i class='fa fa-key' aria-hidden='true'></i>
          <input id='add-psswd' style='width: 80%' autocomplete='new-password' type='password' placeholder='Password'>
        </div>
        <div style='position: relative'>
          <button id='add-account' class='btn btn-primary'>Add</button>
        </div>
      </div>
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
            <i class='fa fa-times delete delete-account' aria-hidden='true'></i>
          </div>
          <div class='row-data-email'>
              ". $row['email'] . "
          </div>
          <div class='row-data-password'>
              *****
          </div>
          <div class='row-data-operation'>
              <a href='#' style='margin:auto; display:inline-block; color: black' class='edit-account'><i class='fa fa-pencil'></i></a>
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
      <div class='row-header-price'>
        zł
      </div>
      </div>";

      $table = "";
      $end_code = "</tbody></table></div>";

      $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

      # What if it doesnt work
      if ($connection->connect_error){
          echo "Connection to database failed :(";
      }
      
      $query_string = "select Rooms.id_room, id_location, description_pl, capacity, price, Count(name) as num_photos from Rooms left join Room_Photo on Rooms.id_room = Room_Photo.id_room group by id_room;";
      
      $result = $connection->query($query_string);

      $connection->close();

      while ($row = mysqli_fetch_assoc($result)) {

        $table .= "
        <div id='room-" . $row['id_room'] . "' class='cell clickable room-entry'>
      <div class='row-data-num'>"
      . $row['id_room'] .
      "</div>
      <div class='row-data-description'>"
      . $row['description_pl'] .
      "</div>
      <div class='row-data-capacity'>"
      . $row['capacity'] . 
      "</div>
      <div class='row-data-photos'>"
      . $row['num_photos'] .
      "</div>
      <div class='row-data-price'>"
      . $row['price'] .
      "</div></div>
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
        $photos_code .= "<div class='rounded photo-entry' style='background-image: url(\"../shared/images/50x50/" . $row['name'] . "\"); background-size: cover'>
          <i class='fa fa-circle fa-stack-2x icon-background' style='position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); visibility: hidden'></i>
          <i class='fa fa-times delete' style='position: absolute; left: 50%; top: 50%; transform: translate(-50%, -50%); visibility: hidden; color: white'></i>
          <input name='existing-photo[" . $row['name'] . "]' style='display: none' type='checkbox'>
        </div>";
      }

      if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $code = "
        <div id='room-edit' class='content animated fadeInUp'>
          <h1><i class='fa fa-angle-left go-back-rooms' style='margin-right: 2rem' aria-hidden='true'></i>Room #" . $row['id_room'] . "</h1>
          <hr>

          <form id='input-div' enctype='multipart/form-data' action='admin.php' method='post'>
            <h5>Capacity & Price</h5>
            <div style='display: flex; flex-wrap: wrap'>
              <div>
                <i class='fa fa-users input-description' aria-hidden='true'></i>
                <input name='capacity' type=\"number\" value='" . $row['capacity'] . "' placeholder=\"Capacity\">
              </div>
              <div>
                <i class='fa fa-money input-description' aria-hidden='true'></i>
                <input name='price' type=\"number\" value='" . $row['price'] . "' placeholder=\"Price\">
              </div>
            </div>
            <br>
            <h5>Descriptions (Polish & English)</h5>
            <textarea name='description_pl' class=\"rounded\" placeholder=\"Polish Description\">" . $row['description_pl'] . "</textarea>
            <br>
            <textarea name='description_en' class=\"rounded\" placeholder=\"English Description\">" . $row['description_en'] . "</textarea>
            <br>
            <input type='number' name='id_room' value='" . $row['id_room'] . "' style='display:none'>
            <input type='text' name='action' value='update-room' style='display:none'>
            <div style='display: flex; justify-content: space-between;'>
            <div>
              <div class='photo-div'>" . $photos_code . "</div>
            </div>
            <div style='display: block; justify-content: flex-end;'>
              <input type='submit' value='Save' class=\"btn btn-primary btn-block text-white\" style=\"margin: 0.5rem; width: auto; height: auto; padding-left: 1.5rem; padding-right: 1.5rem\">
            </div>
            </div>
            <input id='fileInput' type='file' name='pics[]' style=\"width: auto;\" accept='image/*' multiple>
          </form>
          
          </div>
        </div>
        ";
      }

      echo $code;
    }
?>
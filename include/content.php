<?php

    $dashboard = "
        <div id='dashboard' class='content'>
        <div>
          <h1>Dashboard</h1>
          <hr>
          <div class='content-div animated fadeInUp'>
            <div class='card' style='width: 23rem;'>
                <img src='../shared/images/accounts.png' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Accounts</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href=\"javascript:change_view('accounts')\" class='btn btn-primary'>Edit Accounts</a>
                </div>
            </div>
            <div class='card' style='width: 23rem;'>
                <img src='../shared/images/outside1.jpg' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Rooms</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href=\"javascript:change_view('rooms')\" class='btn btn-primary'>Edit Rooms</a>
                </div>
            </div>
            <div class='card' style='width: 23rem;'>
                <img src='https://www.vertical-leap.uk/wp-content/uploads/2017/11/map-1400x800.jpg' style=\"object-fit: cover; height: 30vh\" class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Location</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href=\"javascript:change_view('location')\" class='btn btn-primary'>Edit Location</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    ";


    $accounts = "
    <div id='accounts' class='content'>
    <h1>Accounts</h1>
    <hr>
    <div class='input-section animated fadeIn'>
      <input type='email' placeholder='Email'>
      &nbsp;<input type='password' placeholder='Password'>
      &nbsp;<button class='btn btn-primary'>Add</button>
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
            </thead>
            <tbody>
              <tr id='display-1'>
                <th scope='row'><i class='fa fa-times' aria-hidden='true'></i></th>
                <td id='email-1'>mark@email.com</td>
                <td id='password-1'>********</td>
                <td id='button-1'><a href='#' class='btn btn-secondary' onclick='swap_on_edit(1)'>Edit</a></td>
              </tr>
              <tr>
                <th scope='row'><i class='fa fa-times' aria-hidden='true'></i></th>
                <td>jacob@gmail.com</td>
                <td>********</td>
                <td><a href='#' class='btn btn-secondary'>Edit</a></td>
              </tr>
              <tr>
                <th scope='row'><i class='fa fa-times' aria-hidden='true'></i></th>
                <td>larry@hotmail.com</td>
                <td>********</td>
                <td><a href='#' class='btn btn-secondary'>Edit</a></td>
              </tr>
            </tbody>
          </table>
    </div>
  </div>
    ";

    $location = "
    
    <div id='location' class='content animated fadeInUp'>
    
        <h1>Location</h1>
        <hr>
        <div id=\"input-div\">
          <input type=\"text\" placeholder=\"Address\">
          <input type=\"tel\" placeholder=\"Phone Number\" pattern=\"[0-9]{3}-[0-9]{2}-[0-9]{2}-[0-9]{2}\">
          <textarea class=\"rounded\" placeholder=\"Description\"></textarea>
        </div>
        <div>
        <input type='file' name='pic' style=\"margin: 0.5rem; width: auto;\" accept='image/*'>
        <button class=\"btn btn-primary btn-block text-white\" style=\"margin: 0.5rem; width: auto;\">Save</button>
        </div>
        
    </div>
    ";

    $rooms = "
        <div id='rooms' class='content animated fadeInUp'>
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
          <tbody id='table-rooms'>
            <tr onclick=\"change_view('room-edit');\" id='display-1'>
              <th scope='row'>1</th>
              <td>Incredible room with great views...</td>
              <td>4</td>
              <td>3</td>
              <td><i class='fa fa-check' aria-hidden='true'></i></td>
            </tr>
            <tr>
              <th scope='row'>2</th>
              <td>Incredible room with great views...</td>
              <td>2</td>
              <td>6</td>
              <td><i class='fa fa-check' aria-hidden='true'></i></td>
            </tr>
            <tr>
              <th scope='row'>3</th>
              <td>Incredible room with great views...</td>
              <td>3</td>
              <td>1</td>
              <td><i class='fa fa-check' aria-hidden='true'></i></td>
            </tr>
          </tbody>
        </table>
      </div>
    ";

    $room_edit = "
    <div id='room-edit' class='content animated fadeInUp'>
    
    <h1>Room #1</h1>
    <hr>
    <div id=\"input-div\">
      <input type=\"number\" placeholder=\"Capacity\">
      <textarea class=\"rounded\" placeholder=\"Description\"></textarea>
    </div>
    <div>
    <input type='file' name='pic' style=\"margin: 0.5rem; width: auto;\" accept='image/*'>
    <br><input style=\"margin-left: 1rem; margin-right: 0.5rem; width: auto;\" type=\"checkbox\" value=\"visible\"> Visible
    <button class=\"btn btn-primary btn-block text-white\" style=\"margin: 0.5rem; width: auto;\">Save</button>
    </div>
    
</div>";
    $not_found = "
    
    <div class='content animated fadeInUp'>
    
        <h1>Page not found :(</h1>
        
    </div>
    ";

?>
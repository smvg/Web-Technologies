<?php

    $dashboard = "
        <div id='dashboard' class='content'>
        <div>
          <h1>Dashboard</h1>
          <hr>
          <div class='content-div animated fadeInUp'>
            <div class='card' style='width: 18rem;'>
                <img src='...' class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Accounts</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href='#' onclick='make_content_visible('accounts')' class='btn btn-primary'>Edit Accounts</a>
                </div>
            </div>
            <div class='card' style='width: 18rem;'>
                <img src='...' class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Rooms</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href='#' onclick='make_content_visible('rooms')' class='btn btn-primary'>Edit Rooms</a>
                </div>
            </div>
            <div class='card' style='width: 18rem;'>
                <img src='...' class='card-img-top' alt='...'>
                <div class='card-body'>
                  <h5 class='card-title'>Location</h5>
                  <p class='card-text'>Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                  <a href='#' onclick='make_content_visible('location')' class='btn btn-primary'>Edit Location</a>
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
        <div>
          Address:<input type='text'>
          <br>
          Description:<br><textarea rows='10' cols='40'></textarea>
          <br>
          <input type='file' name='pic' accept='image/*'>
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
            <tr onclick='' id='display-1'>
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

?>
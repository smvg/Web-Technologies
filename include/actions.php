<?php

    function add_account() {
        include("constants.php");

        $email_to_add = $_POST['add-email'];
        $password_to_add = $_POST['add-psswd'];
    
        $password_to_add = hash("sha256", $password_to_add.$salt);
    
        $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);
    
        # What if it doesnt work
        if ($connection->connect_error){
            echo "Connection to database failed :(";
        }
          
        $query_string = "insert into Administrators values('" . $email_to_add . "', 'Name', 'Last Name', '" . $password_to_add . "');";
          
        $result = $connection->query($query_string);
    
        $connection->close();
    }

    function edit_account() {
        include("constants.php");

        $email_to_change = $_POST['old-email'];
        $email_to_update = $_POST['update-email'];
        $password_to_update = $_POST['update-psswd'];
    
        $password_to_update = hash("sha256", $password_to_add.$salt);
    
        $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);
    
        # What if it doesnt work
        if ($connection->connect_error){
            echo "Connection to database failed :(";
        }
          
        $query_string =  "update Administrators set password = '" . $password_to_update . "', email = '" . $email_to_update ."' where email = '" .  $email_to_change . "';";
          
        $result = $connection->query($query_string);
    
        $connection->close();
    }

    function delete_account() {
        
        include("constants.php");

        $email_to_delete = $_POST['demail'];

        $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);
    
        # What if it doesnt work
        if ($connection->connect_error){
            echo "Connection to database failed :(";
        }
          
        $query_string =  "delete from Administrators where email = '" . $email_to_delete  . "';";
          
        $result = $connection->query($query_string);
    
        $connection->close();
    }

?>
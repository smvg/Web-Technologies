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

    function delete_photo() {
        include("constants.php");

        $photo_to_delete = $_POST['photo'];
        $from_room = $_POST['id_room'];

        $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);
    
        # What if it doesnt work
        if ($connection->connect_error){
            echo "Connection to database failed :(";
        }
        
        $query_string =  "delete from Room_Photo where id_room = " .  $from_room . " and name = '" . $photo_to_delete  . "';";
        
        $result = $connection->query($query_string);
    
        $connection->close();
    }

    function edit_room() {
        include("constants.php");

        $target_dir = "../shared/images/";
        $target_file = $target_dir . basename($_FILES["pic"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["pic"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }
        // Check if file already exists
        if (file_exists($target_file)) {
            $bytes = random_bytes(10);
            $target_file = $target_dir . bin2hex($bytes) . "." . $imageFileType;
        }
        // Check file size
        if ($_FILES["pic"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {

        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["pic"]["tmp_name"], $target_file)) {
               
            } else {

            }
        }

    }

?>
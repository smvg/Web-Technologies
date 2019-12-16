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
    
        $password_to_update = hash("sha256", $password_to_update.$salt);
    
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

    function upload_photos($connection, $photos, $id, $table) {
        $target_dir = "../shared/images/";
        $query_string = "";

        $error = 0;

        if(!empty(array_filter($photos['name']))){
            foreach($photos['name'] as $key=>$val){
                // Create a random name for the file
                $bytes = random_bytes(5);
                $random_name = bin2hex($bytes);

                $imageFileType = strtolower(pathinfo($target_dir . basename($photos["name"][$key]),PATHINFO_EXTENSION));
                $target_file = $target_dir . $random_name . "." . $imageFileType;

                $uploadOk = 1;
        
                // Check if image file is a actual image or fake image
                if(isset($_POST["submit"])) {
                    $check = getimagesize($photos["tmp_name"][$key]);
                    if($check !== false) {
                        $uploadOk = 1;
                    } else {
                        $error = 1;
                        $uploadOk = 0;
                    }
                }

                // Check if a file with same name already exists and if so create another random name
                while (file_exists($target_file)) {
                    $bytes = random_bytes(5);
                    $random_name = bin2hex($bytes);
                    $target_file = $target_dir . $random_name . "." . $imageFileType;
                }

                // Check if there's an identical file already uploaded
                $md5_hash_new_file = md5_file($photos['tmp_name'][$key]); // Hash of new file
                $check_hash_query = "SELECT name FROM Photos WHERE md5_hash = '" . $md5_hash_new_file . "';";
                $result = $connection->query($check_hash_query);

                // Does the photo already exist?
                if ($result->num_rows > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $query_string .= "insert into " . $table . "_Photo values(" . $id . ", '" . $row['name'] . "');";
                }
                else {
                    // Check file size (no bigger than 10MB)
                    if ($_FILES["pics"]["size"][$key] > 10000000) {
                        $error = 1;
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                        $error = 1;
                        $uploadOk = 0;
                    }

                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                        $error = 1;
                    // if everything is ok, try to upload file
                    } else {
                        if (move_uploaded_file($_FILES["pics"]["tmp_name"][$key], $target_file)) {
                            $query_string .= "insert into Photos values('" . $random_name . "." . $imageFileType . "', 'something', '" . $md5_hash_new_file . "'); insert into " . $table . "_Photo values(" . $id . ", '" . $random_name . "." . $imageFileType . "');";
                        } else {
                            $error = 1;
                        }
                    }
                }
            }

            if ($error) {
                echo "<script>alert('There was an error uploading your files :(\nMake sure the files dont have a size that exceed 10MB.')</script>";
            }

            $result = $connection->multi_query($query_string);
            while( mysqli_more_results($connection) && mysqli_next_result($connection) );
        }
    }

    // Here we delete photos that we are not using anymore
    function cleanup_old_photos($connection) {
        
        $query_string = "SELECT Photos.name FROM Photos WHERE Photos.name NOT IN (SELECT NAME FROM Location_Photo UNION SELECT NAME FROM Room_Photo);";
        $result = $connection->query($query_string);
        $query_string = "";

        if (!$result) {
            trigger_error('Invalid query: ' . $connection->error);
        }

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $query_string .= "DELETE FROM Photos where name = '" . $row['name'] . "';";
                unlink("../shared/images/" . $row['name']);
            }
        }

        $result = $connection->multi_query($query_string);
        while( mysqli_more_results($connection) && mysqli_next_result($connection) );
    }

    function edit_room() {
        include("constants.php");

        $capacity = $_POST['capacity'];
        $description = $_POST['description'];
        $id_room = $_POST['id_room'];
        $price = $_POST['price'];
        $photos_to_delete = isset($_POST['existing-photo']) ? $_POST['existing-photo'] : [];

        $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

        if ($connection->connect_error){
            echo "Connection to database failed :(";
        }

        $query_string = "UPDATE Rooms SET capacity = " . $capacity . ", description = '" . $description . "', price = " .  $price . " WHERE id_room = " . $id_room .  ";";
        $result = $connection->query($query_string);

        $query_string = "";
        foreach(array_keys($photos_to_delete) as $key) {
            $query_string .=  "delete from Room_Photo where id_room = " .  $id_room . " and name = '" . $key  . "';";
        }
        $result = $connection->multi_query($query_string);
        while( mysqli_more_results($connection) && mysqli_next_result($connection) );

        upload_photos($connection, $_FILES['pics'], $id_room, "Room");

        cleanup_old_photos($connection);

        $connection->close();

    }

    function edit_location() {
        include("constants.php");

        $address = $_POST['address'];
        $tel = $_POST['tel'];
        $email = $_POST['email'];
        $flink = $_POST['flink'];
        $blink = $_POST['blink'];
        $photos_to_delete = isset($_POST['existing-photo']) ? $_POST['existing-photo'] : [];

        $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

        if ($connection->connect_error){
            echo "Connection to database failed :(";
        }

        $query_string = "UPDATE Location SET address_location = '" . $address . "', phone_location = '" . $tel . "', email_location = '" . $email . "',
            facebook_link = '" . $flink . "', booking_link = '" . $blink . "' WHERE id_location = 1;";
        $result = $connection->query($query_string);

        // Here we delete photos that are linked to rooms
        $query_string = "";
        foreach(array_keys($photos_to_delete) as $key) {
            $query_string .=  "delete from Location_Photo where id_location = 1 and name = '" . $key . "';";
        }
        $result = $connection->multi_query($query_string);
        while( mysqli_more_results($connection) && mysqli_next_result($connection) );

        upload_photos($connection, $_FILES['pics'], 1, "Location");

        cleanup_old_photos($connection);

        $connection->close();
    }

?>
<?php

    include "include/constants.php";

    $email = $_POST['email'];
    $password = $_POST['psswd'];

    if (empty($email) || empty($password))
        header("location:index.php?status_code=1");

    $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

    if ($connection->connect_error){
        echo "Connection to database failed :(";
    }

    $query_string = "SELECT password FROM Administrators
                    where email = '" . $email . "';";

    $result = $connection->query($query_string);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['password'] == hash("sha256", $password.$salt)) echo "Success!";
        else header("location:login.php?status_code=1");
    }
    else {
        header("location:login.php?status_code=3");
    }

    $connection->close();
    
?>
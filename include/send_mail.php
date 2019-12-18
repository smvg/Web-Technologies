<?php

    include_once("../include/constants.php");

    $name = $_POST['name'];
    $email = $_POST['email'];
    $text = $_POST['text'];

    $subject = "Message from " . $name . " (" . $email . ")";

    $query_string = "SELECT email from Administrators;";

    $connection = new mysqli($mysql_host, $mysql_user, $mysql_password, $mysql_db);

    # What if it doesnt work
    if ($connection->connect_error){
        echo "Connection to database failed :(";
    }

    $result = $connection->query($query_string);

    while ($row = $result->fetch_assoc()) {
        mail($row['email'],$subject,$message);
    }

    $connection->close();

    ob_start();
    header('Location: /'. $url);
    ob_end_flush();
    die();
?>
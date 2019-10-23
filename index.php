<?php

    include "include/redirect_language.php";

    // COOKIE HAS TO BE SET WITH path=/ TO WORK IN THE ENTIRE WEBSITE

    $language = (isset($_COOKIE["language"])) ? $_COOKIE["language"] : parse_language_header($_SERVER['HTTP_ACCEPT_LANGUAGE']);

    redirect_to_url($language, "index.html");

    exit();
    
?>
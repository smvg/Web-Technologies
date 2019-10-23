<?php

    include "constants.php";

    function parse_language_header($header) {
        return preg_split( "/(,|;)/", $header)[1];
    };

    function redirect_to_url($language, $target) {

        global $available_languages;

        $url = (in_array($language, $available_languages)) ? $language . "/" . $target : "en/" . $target;

        ob_start();
        header('Location: /'. $url);
        ob_end_flush();
        die();
    };

?>
<?php

function displayAlert($status_code) {
    if (!isset($status_code) || $status_code == 0)
        echo "none";
    else
        echo "block";
}

function contentsAlert($status_code) {
    switch ($status_code) {
        case 1:
            echo "<strong>Incorrect credentials.</strong>";
            break;
        case 2:
            echo "<strong>Your account has been created.</strong> Log in to access the dashboard.";
            break;
        case 3:
            echo "<strong>No account has been registered with this email.";
            break;
        default:
            echo "You should not be seeing this.";
            break;
    }
}

?>
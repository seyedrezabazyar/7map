<?php

include '../bootstrap/init.php';

if (!isAjaxRequest()) {
    diePage('Invalid Request!');
}

if (is_null($_POST['loc']) or !is_numeric($_POST['loc'])) {
    echo "Invalid location!";
    die();
}

// Request is Ajax and OK
echo toggleStatus($_POST['loc']);

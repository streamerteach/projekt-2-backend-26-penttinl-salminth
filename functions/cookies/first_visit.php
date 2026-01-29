<?php

//besöker för första gången
$visit_cookie = "first_visit";

if (!isset($_COOKIE[$visit_cookie])) {
    $firstVisit = time();
    setcookie($visit_cookie, $firstVisit, time() + (86400 * 30), "/");
    $returningUser = false;
} else {
    $firstVisit = $_COOKIE[$visit_cookie];
    $returningUser = true;
}

?>
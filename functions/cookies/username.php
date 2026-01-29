<?php

//Username cookie
$_cookie_name = "username";

if (!isset($_COOKIE[$_cookie_name])) {
    $_cookie_value = "Guest";
    setcookie($_cookie_name, $_cookie_value, time() + (86400 * 30), "/");
    $username = $_cookie_value;
} else {
    $username = $_COOKIE[$_cookie_name];
}

?>
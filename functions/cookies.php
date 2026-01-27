<?php

//phpinfo();

$username = $_SERVER['REMOTE_USER'];
print("Välkommen " . $username);

//cookies _ "Welcome penttinl"
$cookie_name = "username";
setcookie($cookie_name, $username, time() + (86400 * 30), "/"); // 86400 = 1 day

//checka om användaren är bekant från tidigare (har en cookie)
if (isset($_COOKIE[$cookie_name])) {
    echo "Cookie '" . $cookie_name . "' is set!<br>";
    echo "Value is: " . $_COOKIE[$cookie_name];
} else {
    echo "Cookie named '" . $cookie_name . "' is not set!";
}

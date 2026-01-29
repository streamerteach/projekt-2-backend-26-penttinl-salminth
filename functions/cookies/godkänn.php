<?php

// godkännande av cookies
if (isset($_GET["accept"])) {
    setcookie("accept_cookies", "accepted", time() + (86400 * 30), "/");
    header("Location: landingpage.php");
}

if (isset($_GET["vägra"])) {
    setcookie("accept_cookies", "decline", time() + (86400 * 30), "/");
       header("Location: landingpage.php");
}

?>
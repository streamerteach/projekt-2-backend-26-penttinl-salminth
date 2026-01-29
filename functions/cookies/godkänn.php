<?php

// godkännande av cookies
if (isset($_GET["accept"])) {
    setcookie("accept_cookies", "accept", time() + (86400 * 30), "/");
    header("Location: ../../landingpage.php");
}

if (isset($_GET["decline"])) {
    setcookie("accept_cookies", "decline", time() + (86400 * 30), "/");
       header("Location: ../../landingpage.php");
}


/*borde de stå decline istället för vägra? och javet int om location far ti landingpage 
när filen heter landigpage.php */
//ja tänker int fixa så att de int fuckar up ng men chiiga sen ba du hinner
?>



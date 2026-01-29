<?php




$time = "";

if (!empty($_POST["date"]) && !empty($_POST["time"])) {
    $time = strtotime($_POST["date"] . " " . $_POST["time"]);
    if ($time <= time()) $time = "";
}

?>

<form method="post">
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <button>Start</button>
</form>

<?php

if ($time) {
    echo "<div id='countdown' data-time='$time'></div>";
}

?>
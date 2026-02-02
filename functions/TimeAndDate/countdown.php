<?php

    $secondsLeft = "";

    if (! empty($_POST["date"]) && ! empty($_POST["time"])) {
    $inputDate = $_POST["date"];
    $inputTime = $_POST["time"];

    $targetTime = strtotime($inputDate . " " . $inputTime);

    $secondsLeft = $targetTime - time();

    if ($secondsLeft <= 0) {
        $secondsLeft = "";
    }
    }

?>

<form method="post" id="dateForm">
    <input type="date" name="date" required>
    <input type="time" name="time" required>
    <button>Start</button>
    
</form>

<?php

    if ($secondsLeft) {
    echo "<div id='countdown' data-seconds='$secondsLeft'></div>";
    }

?>
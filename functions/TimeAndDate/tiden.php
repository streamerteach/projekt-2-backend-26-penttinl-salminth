<?php
//veckodag, dag av månaden, och veckan! 
$day = date("l");
$dayOfMonth = date("j");
$week = (int) date("W");

echo "Today is $day the $dayOfMonth";

//lite hifistelyä med datumendelser
if ($dayOfMonth % 10 == 1 && $dayOfMonth != 11) {
    echo "st";
} elseif ($dayOfMonth % 10 == 2 && $dayOfMonth != 12) {
    echo "nd";
} elseif ($dayOfMonth % 10 == 3 && $dayOfMonth != 13) {
    echo "rd";
} else {
    echo "th";
}

echo ", week $week!";

?>
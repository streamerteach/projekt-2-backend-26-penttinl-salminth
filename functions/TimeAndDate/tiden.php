<?php
//veckodag, dag av månaden, och veckan! 
$day = date("l");
$month = date("j");
$week = date("w");

echo "Today is $day the $month";

//lite hifistelyä med datumendelser
if ($month % 10 == 1 && $month != 11) {
    echo "st";
} elseif ($month % 10 == 2 && $month != 12) {
    echo "nd";
} elseif ($month % 10 == 3 && $month != 13) {
    echo "rd";
} else {
    echo "th";
}

echo ", it is week $week.";

?>
<?php
$logFile = __DIR__ . '/../essentials/visit_log.txt';

//kolla vem besökaren är: användarnamn om inloggad, annars IP
$visitor = isset($_SESSION['username']) ? $_SESSION['username'] : $_SERVER['REMOTE_ADDR'];
$timestamp = date('Y-m-d H:i:s');

//läs loggen och hitta unika besökare
$existingVisitors = [];
$lines = file_exists($logFile) ? file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES) : [];
foreach ($lines as $line) {
    list($user,) = explode('|', $line);
    $existingVisitors[$user] = true;
}

//llogga besök för ny besökare
if (!isset($existingVisitors[$visitor])) {
    file_put_contents($logFile, "$visitor|$timestamp\n", FILE_APPEND);
    $existingVisitors[$visitor] = true;
}

//visa antal unika besökare
$totalVisits = count($existingVisitors);
echo "<section><article><p>Amount of unique visitors: <strong>$totalVisits</strong></p></article></section>";

//visa senaste besökar, senast först
if ($lines) {
    //bestäm om vi ska visa alla eller bara de 5 senaste
    $showAll = isset($_GET['show']) && $_GET['show'] === 'all';

    $lines = array_reverse($lines); //senast först
    $displayLines = $showAll ? $lines : array_slice($lines, 0, 5);

    echo "<section><article><h2>Recent Visitors</h2><ul>";
    foreach ($displayLines as $line) {
        list($user, $time) = explode('|', $line);
        echo "<li><strong>$user</strong> visited at <em>$time</em></li>";
    }
    echo "</ul>";

    //visa länken beroende på om vi visar alla eller bara 5
    if ($showAll) {
        echo '<a href="' . strtok($_SERVER["REQUEST_URI"], '?') . '">Show less</a>';
    } elseif (count($lines) > 5) {
        echo '<a href="?show=all">Show more</a>';
    }

    echo "</article></section>";
} else {
    echo "<section><article><p>No visits recorded yet.</p></article></section>";
}


    
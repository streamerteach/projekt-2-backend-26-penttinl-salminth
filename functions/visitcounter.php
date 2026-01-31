<?php


if (isset($_SESSION['username'])) {
    $logFile = __DIR__ . '/../essentials/visit_log.txt';
    $username = $_SESSION['username'];
    $timestamp = date('Y-m-d H:i:s');
    $entry = "$username|$timestamp\n";
    file_put_contents($logFile, $entry, FILE_APPEND);
}


$logFile = __DIR__ . '/../essentials/visit_log.txt';

if (file_exists($logFile)) {
    $lines = array_reverse(file($logFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES));
    echo "<section><article><h2>Recent Visitors</h2><ul>";
    foreach ($lines as $line) {
        list($user, $time) = explode('|', $line);
        echo "<li><strong>$user</strong> visited at <em>$time</em></li>";
    }
    echo "</ul></article></section>";
} else {
    echo "<section><article><p>No visits recorded yet.</p></article></section>";
}

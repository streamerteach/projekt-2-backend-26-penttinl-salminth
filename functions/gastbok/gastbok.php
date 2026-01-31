<?php
    //textfilen där kommentarerna lagras
    $filename = __DIR__ . "/gastbok.txt";

    //om formuläret skickas iväg
    if (isset($_POST["submit"])) {

    //hämta värden från formuläret
    $user    = htmlspecialchars($_SESSION['username'] ?? 'Guest');
    $comment = htmlspecialchars($_POST["comment"]);
    $time    = date("Y-m-d H:i:s"); //tiden

    //formatera kommentaren som en rad
    $entry = $time . " , " . $user . " , " . $comment . "\n";

    //försök att öppna filen och spara kommentaren
    $file = fopen($filename, "a");

    if ($file) {
        fwrite($file, $entry);
        fclose($file);
    } else {
        echo "Could not open guestbook file.";
    }
    }
?>

<!--Gästbokformuläret-->
<h2>Guestbook</h2>
<form method="post">
    <label>Comment:</label><br>
    <textarea name="comment" required></textarea><br><br>
    <input type="submit" name="submit" value="Post Comment">
</form>

<hr>

<h3>Previous comments</h3>

<?php

    //kolla om användaren vill se alla kommentarer
    $showAll = isset($_GET['all']) && $_GET['all'] == 1;

    //kollar om filen existerar
    if (file_exists($filename)) {

    //läs in alla rader i en array
    $comments = file($filename);

    //vänd på arrayen så att de nyaste kommentarerna kommer först
    $comments = array_reverse($comments);

    $visibleCount  = 3; //visa 3 nyaste kommentarerna
    $totalComments = count($comments);

    foreach ($comments as $index => $line) {
        list($time, $user, $comment) = explode(" , ", $line);
        $comment = htmlspecialchars($comment); //sanitisering av output

        //hoppa över äldre kommentarer om vi inte visar alla
        if (! $showAll && $index >= $visibleCount) {
            continue;
        }

        echo "<p>";
        echo "<strong>$user</strong><br>";
        echo "<small>$time</small><br>";
        echo "$comment";
        echo "</p><hr>";
    }

    //visa länken bara om det finns fler kommentarer än det som visas
    if ($totalComments > $visibleCount) {
        if ($showAll) {
            //visa länken för att gömma äldre kommentarer
            echo '<a href="?all=0">Hide older comments</a>';
        } else {
            //visa länk för att visa äldre kommentarer
            echo '<a href="?all=1">Show older comments</a>';
        }

    }
    }

?>
<?php
    include "./essentials/handy_methods.php";
    include_once "./functions/cookies/first_visit.php";
    include_once "./functions/cookies/username.php";
    include_once "./functions/cookies/info.php";

    $username      = $username ?? "Guest";
    $returningUser = $returningUser ?? false;
    $firstVisit    = $firstVisit ?? null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt2</title>
    <link rel="stylesheet" href="./style.css">
</head>
    <body>
        <div id="container">
            <header>
                <nav>
                    <ul>
                        <a href="./login/"><li>Login</li></a>
                    </ul>
                </nav>
            </header>
            <section>
                <article>
                    <h1>Welcome to Date Bait!</h1>
                        <?php if ($returningUser && $firstVisit): ?>
                        <p>
                        Welcome back,
                        <strong><?php echo htmlspecialchars($username) ?></strong><br>
                        Your first visit was on:
                        <?php echo date("d.m.Y, H:i", $firstVisit) ?>
                        </p>
                        <?php else: ?>
                        <p>
                        Welcome,
                        <strong><?php echo htmlspecialchars($username) ?></strong><br>
                        This is your first visit!
                        </p>
                    <?php endif; ?>
                        <!-- server info osv. -->
                        <p>
                            <strong>Server Info:</strong> <?php echo htmlspecialchars($serverInfo) ?><br>
                            <strong>PHP Version:</strong> <?php echo htmlspecialchars($phpVersion) ?><br>
                            <strong>Cookie Consent:</strong>
                            <?php
                                if ($cookieConsent === "accept") {
                                    echo "Accepted";
                                } elseif ($cookieConsent === "decline") {
                                    echo "Declined";
                                } else {
                                    echo "Not set";
                                }
                            ?>
                        </p>
                </article>
            </section>
            <section id="cookies">
                <p>We use cookies!</p>
                    <div id="cookie-buttons">
                       <a href="./functions/cookies/godkänn.php?accept=true"><button>Accept Cookies</button></a>
                        <a href="./functions/cookies/godkänn.php?decline=true"><button>Decline Cookies</button></a>
                    </div>
            </section>

<section id="annonser">
<h2>Dating Profiles</h2>

<?php

    //hämta 3 slumpmässiga profiler från databasen
    $sql  = "SELECT * FROM Profiles ORDER BY RAND() LIMIT 3";
    $stmt = $conn->query($sql);

    //gå igenom de tre slumpmässigt valda profilrerna, en rad i taget
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo "<div class='profiler'>";  //container för profil annons

    echo "<h3>" . htmlspecialchars($row['realname']) . "</h3>";

    echo "<p><strong>Username:</strong> " . htmlspecialchars($row['username']) . "</p>";

    echo "<p><strong>location:</strong> " . htmlspecialchars($row['location']) . "</p>";

    echo "<p><strong>Preference:</strong> " . htmlspecialchars($row['preference']) . "</p>";

    echo "<p><strong>Bio:</strong><br>" . htmlspecialchars($row['bio']) . "</p>";

    echo "<p><strong>Likes:</strong> " . htmlspecialchars($row['likes']) . "</p>";

    echo "</div>";

    }

?>

</section>

        </div>
    </body>
</html>

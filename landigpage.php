<?php
 include "./essentials/handy_methods.php"; 
 include_once "./functions/cookies/first_visit.php";
include_once "./functions/cookies/username.php";
include_once "./functions/cookies/info.php";

$username = $username ?? "Guest";
$returningUser = $returningUser ?? false;
$firstVisit = $firstVisit ?? null;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projekt1</title>
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
                    <h1>Welcome to the dating site!</h1>
                        <?php if ($returningUser && $firstVisit): ?>
                        <p>
                        Welcome back,
                        <strong><?= htmlspecialchars($username) ?></strong><br>
                        Your first visit was on:
                        <?= date("d.m.Y, H:i", $firstVisit) ?>
                        </p>
                        <?php else: ?>
                        <p>
                        Welcome,
                        <strong><?= htmlspecialchars($username) ?></strong><br>
                        This is your first visit!
                        </p>
                    <?php endif; ?>
                        <!-- server info osv. -->
                        <p>
                            <strong>Server Info:</strong> <?= htmlspecialchars($serverInfo) ?><br>
                            <strong>PHP Version:</strong> <?= htmlspecialchars($phpVersion) ?><br>
                            <strong>Cookie Consent:</strong> <?= $cookieConsent ? "Accepted" : "Not set" ?>
                        </p>
                </article>
            </section>
            <section>
                <p>We use cookies!</p>
                    <div id="cookie-buttons">
                        <!-- dehä funkar int ennu, säger att de e bara en länk fixas senare ork int nu mer -->
                        <a href="?godkänn=true"><button>Accept Cookies</button></a>
                        <a href="?vägra=true"><button>Decline Cookies</button></a>
                    </div>
            </section>

        </div>
    </body>
</html>

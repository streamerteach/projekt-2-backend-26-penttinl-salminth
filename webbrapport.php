<?php include "./essentials/handy_methods.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webbrapport</title>
    <link rel="stylesheet" href="./style.css">
    <script src="./script.js"></script>
</head>
<body>
    <header>
    <div id="logo">Date Bait</div>
    <nav>
        <ul class="navbar">
            <?php
                echo '<li><a href="./home/index.php">Home</a></li>';
                echo '<li><a href="./profile/index.php">Profile</a></li>';
                echo '<li><a href="./webbrapport.php">Webbrapport</a></li>';
            ?>
        </ul>
    </nav>
</header>

<h1>Välkommen till webbrapporten</h1>

<section id="penttinl">
<h2>Penttinl och Salminth reflektioner och feedback</h2>
<p>
<h3>Penttinl åsikter</h3>
I början av andra delen i kursen var det lite svårt att komma igång. Jag tycker att det var för mycket med information och 
saker att lära sig på en gång. <br><br>
Jag tycker ändå att projektet har gått helt bra fast det blev en vecka sent. Det har varit en ganska lärorik uppgift men jag har 
ännu lite svårigheter att förstå mig på databaser och SQL. En stor del av min tid gick till att försöka få de delarna jag gjorde att fungera i 
databasen och att försöka förstå hur det går till. Jag tycker att kursen skulle ha kunnat ha flera mindre projekt eller uppgifter som 
man kan göra på timmarna eller som läxa för att ha mera interaktion och övning. Det som har varit bra med kursen är friheten att jobba i sin egna takt
men jag tycker endå att det skulle vara bättre med fler mindre uppgifter än ett stort projekt.<br><br> Tack för en lärorik kurs!

<h3>Salminth åsikter</h3>

</p>

</section>
<section id="mockupbild">
    <p>Bild på mockuppen som vi gjorde på papper och penna för projekt 1</p>
<img src="./mockup/mockupbild.jpg" alt="Mockup bilden i början av projektet">
</section>
</body>
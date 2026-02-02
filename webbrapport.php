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
<h2>penttinl rapport</h2>
<p>
Jag tycker att projektet har varit krävande men också rolig.
Jag har lärt mig en massa om php och hur backend fungerar i allmänhet.
Härtills har kursen varit lämplig fast takten ibland varit lite för snabb.
Största delen av min tid har gått till projektet och att lära mig php.
Jag spenderade helt för länge tid på att försöka få registreringen att fungera med email och
användarnamn men till slut så fick jag inte något att fungera vilket var frustrerande. <br><br>

Värsta delen med både projektet och kursen har kanske varit min tidsanvändning. Jag har inte satt
tillräckligt med tid på att lära mig backend aspekterna som t.ex. hur cookies och sessions fungerar.
Jag skulle kunna veta mycket mer än just nu om jag bara satte mera tid på att undersöka och experimentera.
Allt lämnades ganska långt till sista minuten, men jag kommer att förbättra detta med nästa projekt. <br><br>

Jag tror att lektionerna skulle vara roligare om ena halvan går till teori och resten är sedan att
själv jobba på projektet med hjälp om det behövs. Några gånger har vi haft det så vilket jag tycker är ett bättre
system. Det blir ganska mycket med att bara sitta och göra exakt det som händer på projektorn. 
</p>

</section>
<section id="mockupbild">
    <p>Bild på mockuppen som vi gjorde på papper och penna</p>
<img src="./mockup/mockupbild.jpg" alt="Mockup bilden i början av projektet">
</section>
</body>
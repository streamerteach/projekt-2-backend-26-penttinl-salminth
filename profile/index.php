<?php include "../essentials/handy_methods.php"; ?>
<?php include "../essentials/header.php"; ?>
<script src="../countdown.js"></script>
<body>
<div id="container"> <!--Max bredd 800px -->
    <?php include "../essentials/nav.php"; ?>
    <section>
        <article>
            <h1>My profile </h1>
            <p>Upload a profile picture here:</p>
            <!-- profile picture comes here -->
        </article>
        <article>
            <?php include "../functions/TimeAndDate/tiden.php"; ?>
        </article>
    </section>

    <section id="datebooking">
        <h2>Put in the date and time for your date and see how much time there is left!</h2>
        <?php include "../functions/TimeAndDate/countdown.php"; ?>
        <!-- ska modifiera timern ennu så att insatta datumet och tiden sparas, och endast resettas av en "reset" knapp -->

    </section>
</body>
</html>
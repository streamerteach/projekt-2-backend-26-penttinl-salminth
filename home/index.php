<?php include "../essentials/handy_methods.php"; ?>
<?php include "../essentials/header.php"; ?>


<body>
    <div id="container"> <!--Max bredd 800px -->
     <?php include "../essentials/nav.php"; ?>
    <section>
        <article>
            <h1>Homepage</h1>
        </article>
    </section>

    <section id="annonser">
        <h2>Dating Profiles</h2>

        <?php include  "../functions/show_profiles.php"; ?>

    </section>

    <section id="guestbook">
        <?php include "../functions/gastbok/gastbok.php"; ?>
    </section>
</body>
</html>
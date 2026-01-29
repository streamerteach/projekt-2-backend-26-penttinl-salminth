<?php include "../essentials/handy_methods.php"; ?>
<?php include "../essentials/header.php"; ?>
<body>
<div id="container"> <!--Max bredd 800px -->
    <?php $navMode = "login"; ?>
    <?php include "../essentials/nav.php"; ?>
    <section>
        <article>
            <h2>Min dejting sajt</h2>
            <p>Logga in eller registrera dig här</p>
        </article>
        <article>
            <h2>Registreringsformulär</h2>
        <form action="./index.php" method="POST">
            Användarnamn:<br> <input type="text" name="username"><br>
            E-mail:<br> <input type="email" name="email"><br>
            Lösenord:<br> <input type="password" name="password"><br>
            <input type="submit" value="Registrera dig">
        </form>
            <p>Har du redan ett konto?<a href="./index.php?form=login">Logga in här</a></p>
            <?php include "../functions/loginformular.php"?>
        </article>
    </section>
</body>
</html>
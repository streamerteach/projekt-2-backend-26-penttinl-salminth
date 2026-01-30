<?php include "../essentials/handy_methods.php"; ?>
<?php include "../essentials/header.php"; ?>
<body>
<div id="container"> <!--Max bredd 800px -->
    <?php $navMode = "login"; ?>
    <?php include "../essentials/nav.php"; ?>
    <section>
        <article>
            <h2>Better than Tinder!</h2>
            <p><b>Sign up or log in</b></p>
        </article>
        <article>
            <h2>Registration Form</h2>
        <form action="./index.php" method="POST">
            Username:<br> <input type="text" name="username"><br>
            E-mail:<br> <input type="email" name="email"><br>
            Password:<br> <input type="password" name="password"><br>
            <input type="submit" name="register" value="Register">
        </form>
            <p>If you already have an account: <a href="./index.php?form=login">Log in here</a></p>
            <?php include "../functions/loginformular.php"?>
        </article>
    </section>
</body>
</html>

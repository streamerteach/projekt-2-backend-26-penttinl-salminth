<?php include "../essentials/handy_methods.php"; ?>
<?php include "../login/model_login.php"; ?>
<?php include "../essentials/header.php"; ?>

<body>
<div id="container">
    <?php $navMode = "login"; ?>
    <?php include "../essentials/nav.php"; ?>

    <section>
        <article>
            <h2>Better than Tinder!</h2>
            <p><b>Log in to continue</b></p>

            <?php include "view_login.php"; ?>

               <hr>

                <p>
                    Don't have an account?
                    <a href="index.php?register=1">Register here!</a>
                </p>

            <?php include "view_register.php"; ?>

        </article>
    </section>
</div>
</body>
</html>


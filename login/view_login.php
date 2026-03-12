<form action="index.php" method="POST">
    <input type="text" name="username" placeholder="Username">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Log in">
</form>

    <!--om inloggning misslyckas visa error meddelandet under inloggningsformuläret -->
    <?php if (! empty($login_error)) {?>
        <p style="color:red; margin-top:10px;">
            <?php echo $login_error; ?>
        </p>
    <?php }?>


<?php include "model_login.php"; ?>


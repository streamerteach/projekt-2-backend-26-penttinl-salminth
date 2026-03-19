
<?php if (isset($_GET['register'])) { ?>

<h3>Create an account here!</h3>

<form action="index.php?register=1" method="POST">
    <input type="text" name="register_username" placeholder="Username" required>
    <input type="text" name="realname" placeholder="Real name" required>
    <input type="password" name="register_password" placeholder="Password" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="text" name="location" placeholder="Location" required>
    <textarea name="bio" placeholder="Your Bio"></textarea>

     <!-- fält för årslön, endast siffror tillåtna, max 10 tecken -->
    <input type="text"
       name="salary"
       placeholder="annual salary" 
       pattern="[0-9]{1,10}"   
       maxlength="10">             

    <!-- en dropdown för preferensval -->
    <select name="preference">
    <option value="1">Man</option>
    <option value="2">Woman</option>
    <option value="3">Both</option>
    <option value="4">Other</option>
    <option value="5">Salary</option>
    <option value="6">Likes</option>
    </select>

    <input type="submit" value="Register"> <!-- knapp för att skicka formuläret iväg -->

</form>
<!-- registreringslogiken inkluderad -->
<?php include "model_register.php"; ?>

<?php } ?>  <!-- avslutar if satsen som styr om formuläret visas -->

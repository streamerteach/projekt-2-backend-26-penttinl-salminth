<?php
//startas session om den inte redan är igång
//behövs för att kunna lagra tillfälliga värden t.ex. bekräftelsesteg
if (session_status() === PHP_SESSION_NONE) session_start();

if (!empty($_POST['confirmDelete'])) {
    $_SESSION['deleteReady'] = true;
}

//visa lösenordesformuläret om knappen är tryckt
if (!empty($_SESSION['deleteReady'])) {
?>

<h2>Confirm deletion</h2>
<form action="index.php" method="POST">
    Enter your password: 
    <input type="password" name="delete_password" placeholder="Password" required>
    <input type="submit" name="delete_profile" value="Delete Profile">
</form>

<?php
} else {
// Step 3: Show initial delete button
?>
<form action="index.php" method="POST">
    <!-- användaren klickar för att börja raderingsprocessen -->
    <input type="submit" name="confirmDelete" value="Delete profile">
</form>
<?php
}
?>


<?php

$login_error = ""; //skapa en ny error message so sedan kan fyllas om login misslyckas

// hantera login request: Verifiera inmatat lösenord med hash från DB
if (! empty($_POST['password']) && ! empty($_POST['username'])) {

    $username = test_input($_POST['username']); //användarnamn validation

    //hämta sparade hashen från databasen
    $sql    = "SELECT * FROM Profiles WHERE username = ?";
    $result = $conn->prepare($sql);
    $result->execute([$username]);

    //hämta resultatet som en associativ array
    $row = $result->fetch(PDO::FETCH_ASSOC);

    //kontrollera att användaren finns i databasen
    if ($row) {

        // hämta passhash från DB
        $hashed_password = $row['passhash'];

        //matchar lösenordet med hashet
        if (password_verify($_POST['password'], $hashed_password)) {

            $_SESSION['user_id']  = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role']     = $row['role']; // Används för att veta om det är admin eller vanlig användare

            header("Location: ../profile/index.php"); //till profilsidan
            exit;

        } else {
            $login_error = "Wrong username or password. Try again.";
        }

    } else {
        $login_error = "Wrong username or password. Try again.";
    }
}

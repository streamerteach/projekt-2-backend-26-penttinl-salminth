<?php

// hantera login request: Verifiera inmatat lösenord med hash från DB
if (!empty($_POST['password']) && !empty($_POST['username'])) {

    $username = test_input($_POST['username']); //användarnamn validation

    //hämta sparade hashen från databasen
    $sql = "SELECT * FROM Profiles WHERE username = ?";
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

            $_SESSION['username'] = $row['username']; //spara användarnam i sessionen för att logga in användaren

            header("Location: ../profile/index.php"); //till profilsidan
            exit;

        } else {
            echo "wrong password.";
        }

    } else {
        echo "User not found.";
    }
}
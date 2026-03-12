<?php

//hantera registrerings requesten
if (! empty($_POST['register_username'])) {

    //sanera användarens inmatningar
    $username   = test_input($_POST['register_username']);
    $realname   = test_input($_POST['realname']);
    $location   = test_input($_POST['location']);
    $bio        = test_input($_POST['bio']);
    $salary     = test_input($_POST['salary']);
    $preference = test_input($_POST['preference']);
    $email      = test_input($_POST['email']);

    //hasha lösenordet innan lagring i databas
    $hashed_password = password_hash($_POST['register_password'], PASSWORD_DEFAULT);

    //kontrollera om användarnamnet finns redan i databasen
    $sql  = "SELECT username FROM Profiles WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        echo "<p>Username already exists.</p>";
        return;  //avbryt registreringen
    }

    //kontrolelra om email readn finns i databasen
    $sql  = "SELECT email FROM Profiles WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        echo "<p>Email already exists. Use another email!</p>";
        return;  //avbryt igen
    }

    //kör insert med användarens data
    $sql = "INSERT INTO Profiles
    (id, username, realname, location, bio, salary, preference, email, likes, passhash, created)
    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, 0, ?, NOW())";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        $username,
        $realname,
        $location,
        $bio,
        $salary,
        $preference,
        $email,
        $hashed_password,
    ]);

    //registrerings bekräftelse
    echo "<p>User created! You can now log in.</p>";
    echo '<p><a href="index.php">Return to login</a></p>';
}

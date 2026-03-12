<?php
//kontrollerar om användaren har skickat formuläret för att uppdatera profilen

if (!empty($_POST['update_profile'])) {

    //hämta och sanera alla fält från formuläret
    //test_input() används för att rensa bort oönskade tecken
    $realname   = test_input($_POST['realname']);
    $email      = test_input($_POST['email']);
    $location   = test_input($_POST['location']);
    $bio        = test_input($_POST['bio']);
    $salary     = test_input($_POST['salary']);
    $preference = test_input($_POST['preference']);

    //frågan för att uppdatera användarens profil i databasen
    $sql = "UPDATE Profiles
            SET realname=?, email=?, location=?, bio=?, salary=?, preference=?
            WHERE username=?";
    //skyddar mot SQL-injection
    $stmt = $conn->prepare($sql);

    //uppdaterade värden
    $stmt->execute([
        $realname,
        $email,
        $location,
        $bio,
        $salary,
        $preference,
        $_SESSION['username']  //väljer vilken profil som ska uppdateras

    ]);

}

?>
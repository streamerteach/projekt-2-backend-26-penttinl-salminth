<?php
//kontrollera om användaren har skickat formuläret för att radera profilen
if (!empty($_POST['delete_profile'])) {
    //hämta password av bekreftälseformuläret
    $password = $_POST['delete_password'];

    //hämtar hashade lösenordet från DB för den inloggade användaren
    $sql = "SELECT passhash FROM Profiles WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$_SESSION['username']]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    //kontrollera att användaren finns och att lösenordet är valid
    if ($row && password_verify($password, $row['passhash'])) {
        $sql = "DELETE FROM Profiles WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$_SESSION['username']]);

        //avsluta sessionen eftersom kontot inte längre finns
        session_destroy();
        echo "<p>Profile deleted.</p>";
        echo '<p><a href="../login/index.php">Return to login</a></p>';
        exit;
    } else {
        //om fel lösenord
        echo "<p>Wrong password.</p>";
    }
}

//Efter att profilen har raderats eller om lösenordet var fel, nollställs sessions-flaggan
if (!empty($_SESSION['deleteReady'])) {
    unset($_SESSION['deleteReady']);
}
?>
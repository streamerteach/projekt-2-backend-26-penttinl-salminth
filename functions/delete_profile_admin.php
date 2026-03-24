<?php

require_once "../essentials/handy_methods.php";

//säkerställ att det är admin eller manager
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager')) {
    
    // Kontrollera att ett ID har skickats med i URL:en
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $profile_id = $_GET['id'];

        try {
            // börjar med att förbereda SQL-frågan
            // raderar baserat på 'id' som är primärnyckel
            $sql = "DELETE FROM Profiles WHERE id = ?";
            $stmt = $conn->prepare($sql);
            $stmt->execute([$profile_id]);



        } catch (PDOException $e) {
            // Om något går fel med databasen 
            die("Ett fel uppstod vid radering: " . $e->getMessage());
        }
    }
}

// Skicka användaren tillbaka till sidan de kom ifrån (Home-sidan)
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
<?php
//hämta hela profilen för den inloggade användaren
$sql = "SELECT * FROM Profiles WHERE username = ?";
$stmt = $conn->prepare($sql); //skydd mot SQL-injection
$stmt->execute([$_SESSION['username']]);

$user = $stmt->fetch(PDO::FETCH_ASSOC); //hämta resultat från DB som en associative array

?>
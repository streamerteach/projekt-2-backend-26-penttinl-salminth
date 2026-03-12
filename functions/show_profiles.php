<?php

//hämta alla profiler från db
$sql = "SELECT * FROM Profiles";
$stmt = $conn->query($sql);

//loopa igenom
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    echo "<div class='profiler'>"; //container för varje profil

    //visa användar specifika värden från profilen
    echo "<h3>" . htmlspecialchars($row['realname']) . "</h3>";

    echo "<p><strong>Username:</strong> " . htmlspecialchars($row['username']) . "</p>";

    echo "<p><strong>City:</strong> " . htmlspecialchars($row['city']) . "</p>";

    echo "<p><strong>Preference:</strong> " . htmlspecialchars($row['preference']) . "</p>";

    echo "<p><strong>About me:</strong><br>" . htmlspecialchars($row['bio']) . "</p>";

    echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";

    echo "<p><strong>Salary:</strong> " . htmlspecialchars($row['salary']) . "</p>";

    echo "<p><strong>Likes:</strong> " . htmlspecialchars($row['likes']) . "</p>";

    echo "</div>";
}

?>
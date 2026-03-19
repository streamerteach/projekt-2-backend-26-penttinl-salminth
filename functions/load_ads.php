<?php
require_once "../essentials/handy_methods.php";

// Kolla vilken sida och filter vi är på
$page   = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$limit  = 5;                    // Enligt uppgiften: 5 annonser per sida
$offset = ($page - 1) * $limit; // Räknar ut startpunkten

$pref  = isset($_GET['pref']) ? $_GET['pref'] : 'all';
$likes = isset($_GET['likes']) ? (int) $_GET['likes'] : 0;

// filter
$sql = "SELECT id, username, realname, location, preference, bio, email, salary, likes
        FROM Profiles
        WHERE likes >= :likes";

//lägg till preferens i sökningen om man inte valt alla
if ($pref !== 'all') {
    $sql .= " AND preference = :pref";
}

//sortera på populäraste först och hämta bara 5 åt gången
$sql .= " ORDER BY likes DESC LIMIT :limit OFFSET :offset";


$stmt = $conn->prepare($sql);
$stmt->bindValue(':likes', $likes, PDO::PARAM_INT);

if ($pref !== 'all') {
    $stmt->bindValue(':pref', (int) $pref, PDO::PARAM_INT);
}

$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);



$stmt->execute();


while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $liked = false;

    
    if (isset($_SESSION['user_id'])) {
        $check = $conn->prepare("SELECT 1 FROM likes WHERE user_id = :uid AND profile_id = :pid");
        $check->execute([
            ':uid' => $_SESSION['user_id'],
            ':pid' => $row['id'],
        ]);

        if ($check->rowCount() > 0) {
            $liked = true;
        }
    }

    echo "<div class='profiler'>";
    echo "<h3>" . htmlspecialchars($row['realname']) . "</h3>";
    echo "<p><strong>Username:</strong> " . htmlspecialchars($row['username']) . "</p>";
    echo "<p><strong>location:</strong> " . htmlspecialchars($row['location']) . "</p>";
    echo "<p><strong>Preference:</strong> " . htmlspecialchars($row['preference']) . "</p>";
    echo "<p><strong>Bio:</strong><br>" . htmlspecialchars($row['bio']) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($row['email']) . "</p>";
    echo "<p><strong>Salary:</strong> " . htmlspecialchars($row['salary']) . "</p>";

    
    echo "<p><strong>Likes:</strong> <span id='likes-" . $row['id'] . "'>" . $row['likes'] . "</span></p>";

    
    if (isset($_SESSION['user_id'])) {
        $btnText = $liked ? "Unlike" : "Like";
        echo "<button onclick='toggleLike(" . $row['id'] . ")' id='btn-" . $row['id'] . "'>$btnText</button>";
    }

    echo "</div>";
}


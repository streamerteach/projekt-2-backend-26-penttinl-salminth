<?php
include "../essentials/handy_methods.php";

// säkerhetskontroll för att bara admin och manager ska kuna se sidan
if (!isset($_SESSION['role']) || ($_SESSION['role'] !== 'admin' && $_SESSION['role'] !== 'manager')) {
    die("Du har inte behörighet att se denna sida.");
}

// användarens data
if (isset($_GET['id'])) {
    $target_id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM Profiles WHERE id = ?");
    $stmt->execute([$target_id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        die("Användaren hittades inte.");
    }
}

// uppdatera datan när man sparar
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_realname = $_POST['realname'];
    $new_bio = $_POST['bio'];
    $new_location = $_POST['location'];
    $uid = $_POST['user_id'];

    $update_sql = "UPDATE Profiles SET realname = ?, bio = ?, location = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_sql);
    
    if ($update_stmt->execute([$new_realname, $new_bio, $new_location, $uid])) {
        echo "<p style='color:green;'>Profilen har uppdaterats!</p>";
        // Uppdatera lokala variabeln så formuläret visar den nya infon direkt
        $user['realname'] = $new_realname;
        $user['bio'] = $new_bio;
        $user['location'] = $new_location;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Redigera profil - Admin</title>
    <link rel="stylesheet" href="../css/style.css"> </head>
<body>
    <div id="container">
        <h1>Redigera profil för: <?php echo htmlspecialchars($user['username']); ?></h1>
        <p><a href="../home/index.php">Tillbaka till annonser</a></p>

        <form method="POST" class="profiler" style="padding: 20px;">
            <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">

            <label>Namn:</label><br>
            <input type="text" name="realname" value="<?php echo htmlspecialchars($user['realname']); ?>" style="width:100%;"><br><br>

            <label>Location:</label><br>
            <input type="text" name="location" value="<?php echo htmlspecialchars($user['location']); ?>" style="width:100%;"><br><br>

            <label>Bio:</label><br>
            <textarea name="bio" style="width:100%; height:100px;"><?php echo htmlspecialchars($user['bio']); ?></textarea><br><br>

            <button type="submit" style="background: blue; color: white; padding: 10px;">Spara ändringar</button>
        </form>
    </div>
</body>
</html>
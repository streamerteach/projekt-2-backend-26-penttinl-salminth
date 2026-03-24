<?php
session_start();
require_once "../essentials/handy_methods.php"; // Din databaskoppling ($conn)

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['username'])) {
    $sender = $_SESSION['username']; // Den inloggade
    $receiver = $_POST['receiver'];  // Den som ska få kommentaren
    $text = trim($_POST['comment']);

    if (!empty($text)) {
        $sql = "INSERT INTO comments (sender_username, receiver_username, comment_text) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$sender, $receiver, $text]);
    }
}
// Skicka användaren tillbaka till sidan de kom ifrån
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
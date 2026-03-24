<?php
require_once "../essentials/handy_methods.php";

// Kontrollera om användaren är inloggad och är admin
if (isset($_SESSION['role']) && ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'manager')) {
    
    if (isset($_GET['id'])) {
        $comment_id = $_GET['id'];
        
        $sql = "DELETE FROM comments WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$comment_id]);
    }
}

// Skicka tillbaka till föregående sida
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
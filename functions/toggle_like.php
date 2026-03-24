<?php
include "../essentials/handy_methods.php";

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    exit("not_logged_in");
}

$user_id = $_SESSION['user_id'];
$profile_id = isset($_POST['profile_id']) ? (int)$_POST['profile_id'] : 0;

// Safety check
if ($profile_id <= 0) {
    exit("invalid");
}

// Check if user already liked this profile
$stmt = $conn->prepare("SELECT 1 FROM likes WHERE user_id = :user_id AND profile_id = :profile_id");
$stmt->execute([
    ':user_id' => $user_id,
    ':profile_id' => $profile_id
]);

if ($stmt->rowCount() > 0) {

    // UNLIKE
    $conn->prepare("DELETE FROM likes WHERE user_id = :user_id AND profile_id = :profile_id")
        ->execute([
            ':user_id' => $user_id,
            ':profile_id' => $profile_id
        ]);

    // Decrease like count (prevent going below 0)
    $conn->prepare("UPDATE Profiles SET likes = GREATEST(likes - 1, 0) WHERE id = :id")
        ->execute([':id' => $profile_id]);

    echo "unliked";

} else {

    // LIKE
    $conn->prepare("INSERT INTO likes (user_id, profile_id) VALUES (:user_id, :profile_id)")
        ->execute([
            ':user_id' => $user_id,
            ':profile_id' => $profile_id
        ]);

    // Increase like count
    $conn->prepare("UPDATE Profiles SET likes = likes + 1 WHERE id = :id")
        ->execute([':id' => $profile_id]);

    echo "liked";
}
?>
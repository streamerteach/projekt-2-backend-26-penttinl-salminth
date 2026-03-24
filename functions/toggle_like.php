<?php
include "../essentials/handy_methods.php";

//kolla om användaren är inloggad
if (!isset($_SESSION['user_id'])) {
    exit("not_logged_in");
}

$user_id = $_SESSION['user_id'];
$profile_id = isset($_POST['profile_id']) ? (int)$_POST['profile_id'] : 0;


if ($profile_id <= 0) {
    exit("invalid");
}

//granska om användaren redan har gillat profilen
$stmt = $conn->prepare("SELECT 1 FROM likes WHERE user_id = :user_id AND profile_id = :profile_id");
$stmt->execute([
    ':user_id' => $user_id,
    ':profile_id' => $profile_id
]);

if ($stmt->rowCount() > 0) {

    //ogilla
    $conn->prepare("DELETE FROM likes WHERE user_id = :user_id AND profile_id = :profile_id")
        ->execute([
            ':user_id' => $user_id,
            ':profile_id' => $profile_id
        ]);

    //minska like counten och undvik mer än 0 likes
    $conn->prepare("UPDATE Profiles SET likes = GREATEST(likes - 1, 0) WHERE id = :id")
        ->execute([':id' => $profile_id]);

    echo "unliked";

} else {

    //gilla
    $conn->prepare("INSERT INTO likes (user_id, profile_id) VALUES (:user_id, :profile_id)")
        ->execute([
            ':user_id' => $user_id,
            ':profile_id' => $profile_id
        ]);

    //öka mängden likes
    $conn->prepare("UPDATE Profiles SET likes = likes + 1 WHERE id = :id")
        ->execute([':id' => $profile_id]);

    echo "liked";
}
?>
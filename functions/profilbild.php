<?php


if (empty($_SESSION['username'])) {
    echo "<p style='color:red;'>You must be logged in to upload a profile picture.</p>";
    return;
}

$username = $_SESSION['username'];
$uploadDir = "../profile/uploads/";
$maxSize = 2 * 1024 * 1024; // 2 MB


if (isset($_POST['upload']) && isset($_FILES['profile_image'])) {
    $file = $_FILES['profile_image'];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<p style='color:red;'>Upload error. Please try again.</p>";
    } elseif ($file['size'] > $maxSize) {
        echo "<p style='color:red;'>File too large. Max size is 2 MB.</p>";
    } else {
        $allowedTypes = ['image/jpeg' => 'jpg', 'image/png' => 'png'];

        if (!array_key_exists($file['type'], $allowedTypes)) {
            echo "<p style='color:red;'>Only JPG and PNG files are allowed.</p>";
        } else {
            $extension = $allowedTypes[$file['type']];
            $hash = md5_file($file['tmp_name']);
            $newName = $username . "_" . $hash . "." . $extension;
            $target = $uploadDir . $newName;

            if (file_exists($target)) {
                echo "<p style='color:red;'>This image has already been uploaded.</p>";
            } else {
                if (move_uploaded_file($file['tmp_name'], "../profile/uploads/" . $newName)) {
                    echo "<p style='color:green;'>Profile picture uploaded!</p>";
                } else {
                    echo "<p style='color:red;'>Upload failed. Please try again.</p>";
                }
            }
        }
    }
}


$userImages = glob($uploadDir . $username . "_*.*");

if (!empty($userImages)) {
    echo "<div style='float:right; max-width:300px;'>";
    echo "<h3>Your uploaded pictures:</h3>";
    foreach ($userImages as $img) {
        $browserPath = "../profile/uploads/" . basename($img);
        echo "<img src='$browserPath' alt='Profile image' style='width:100%; margin-bottom:10px; border-radius:8px;'>";
    }
    echo "</div>";
} else {
    echo "<p>No profile pictures uploaded yet.</p>";
}
?>
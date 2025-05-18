<?php
require_once "../model/users.php";
session_start();

function validateUploadPhoto() {
    if (!isset($_FILES["profile-photo"]) || $_FILES["profile-photo"]["error"] === UPLOAD_ERR_NO_FILE) {
        echo "Profile Photo is required.<br>";
        return false;
    }

    $file = $_FILES["profile-photo"];
    $allowedTypes = ["image/jpg", "image/jpeg", "image/png"];
    $maxSize = 5 * 1024 * 1024;

    if ($file["error"] !== UPLOAD_ERR_OK) {
        echo "Error uploading file.<br>";
        return false;
    }

    if (!in_array($file["type"], $allowedTypes)) {
        echo "Only JPG, JPEG, or PNG formats are allowed.<br>";
        return false;
    }

    if ($file["size"] > $maxSize) {
        echo "File size must be less than 5MB.<br>";
        return false;
    }

    $tmp = explode('.', $file['name']);
    $newFileName = round(microtime(true)) . '.' . end($tmp);

    $uploadDir = "../assets/uploads/profilePicture/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $uploadPath = $uploadDir . $newFileName;

    if (move_uploaded_file($file["tmp_name"], $uploadPath)) {
        $user = [
            'email' => $_SESSION['email'],
            'imageUrl' => $uploadPath,
            'updatedAt' => date("Y-m-d H:i:s")
        ];
        if (updateAvatar($user)) {
            $_SESSION['imageUrl'] = $uploadPath;
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (validateUploadPhoto()) {
        header("Location: ../view/userProfile.php");
    } else{
        echo "Failed to upload photo.<br>";
    }
} else {
    echo("Invalid request");
}
?>

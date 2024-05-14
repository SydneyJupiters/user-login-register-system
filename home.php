<?php
session_start();
require_once 'config.php';
require_once 'classes/User.php';
require_once 'classes/FileUploader.php';

$user = new User($connection);

// Redirect to login if user is not logged in
if (!$user->isLoggedIn()) {
    header("Location: index.php");
    exit();
}

$fileUploader = new FileUploader();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['file'])) {
    $result = $fileUploader->uploadFile($_FILES['file']);
    $uploadMessage = $result;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <div>
        <div>
            <h2>Welcome <?php echo $username; ?></h2>
            <h3>Upload a file here:</h3>
            <form action="home.php" method="post" enctype="multipart/form-data">
                <input type="file" name="file" required><br><br>
                <button type="submit" name="upload">Upload</button>
            </form>
            <?php if (isset($uploadMessage)) { echo "<p>$uploadMessage</p>"; } ?>
        </div>
        <div>
            <a href="logout.php">Logout</a>
        </div>
    </div>
</body>

</html>
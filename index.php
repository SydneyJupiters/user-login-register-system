<?php
session_start();
require_once 'config.php';
require_once 'classes/User.php';

$user = new User($connection);

// Check if the user is already logged in
if ($user->isLoggedIn()) {
    header("Location: home.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($user->login($username, $password)) {
            header("Location: home.php");
            exit();
        } else {
            $loginError = "Invalid username or password.";
        }
    } elseif (isset($_POST['register'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        if ($user->register($username, $password)) {
            $_SESSION['username'] = $username;
            header("Location: home.php");
            exit();
        } else {
            $registrationError = "Username already exists.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login or Register</title>
</head>

<body>
    <h2>Login or Register</h2>
    <form action="index.php" method="post">
        <input type="text" name="username" placeholder="Username" required><br><br>
        <input type="password" name="password" placeholder="Password" required><br><br>
        <button type="submit" name="login">Login</button>
        <button type="submit" name="register">Register</button>
    </form>
    <?php if (!empty($loginError))
        echo "<p>$loginError</p>"; ?>
    <?php if (!empty($registrationError))
        echo "<p>$registrationError</p>"; ?>
</body>

</html>
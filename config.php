<?php
// Database connection configuration
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_logins"; //I named my database user_logins and my table users

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}
?>
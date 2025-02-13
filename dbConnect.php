<?php
// define('HOST', 'localhost');
// define('DB_USER', 'root');
// define('PASSWORD', '');
// define('DB_NAME', 'frutioncars');

$host = "localhost"; // Change as needed
$dbname = "frutioncars"; // Change as needed
$username = "root"; // Change as needed
$password = ""; // Change as needed;

//    craete database connection
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Could not Connect ' . mysqli_connect_errno());
}


try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

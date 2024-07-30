<?php
$host = 'localhost';
$db = 'hospitaltriage';
$user = 'postgres';
$pass = 'richa123';
$dsn = "pgsql:host=$host;dbname=$db";

// Adding new PDO instance
try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>


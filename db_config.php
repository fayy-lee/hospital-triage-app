<?php

$host = 'localhost';
$dbname = 'hospital_triage';
$user = 'your_username';
$pass = 'your_password';

// Create a new PDO instance
try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}
?>

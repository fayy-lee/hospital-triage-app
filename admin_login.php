<?php
session_start(); // Start the session
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to find the admin by username
    $query = 'SELECT * FROM admins WHERE username = :username';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if admin exists and password matches
    if ($admin && $password === $admin['password']) {
        $_SESSION['admin_logged_in'] = true; // Set session variable
        echo 'Login successful!';
    } else {
        echo 'Invalid username or password.';
    }
} else {
    echo 'Invalid request method.';
}
?>


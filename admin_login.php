<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = 'SELECT * FROM admins WHERE username = :username';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password'])) {
        echo 'Login successful!';
        // Set session variables or redirect if needed
    } else {
        echo 'Invalid username or password.';
    }
} else {
    echo 'Invalid request method.';
}
?>


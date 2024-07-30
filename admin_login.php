<?php
include 'db_config.php';
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE username = :username";
$stmt = $pdo->prepare($sql);
$stmt->execute(['username' => $username]);
$admin = $stmt->fetch();

if ($admin && password_verify($password, $admin['password'])) {
    $_SESSION['admin'] = $admin['username'];
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'fail']);
}
?>

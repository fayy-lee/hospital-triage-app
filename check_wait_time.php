<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $code = $_POST['code'];

    $query = 'SELECT wait_time FROM patients WHERE name = :name AND code = :code';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':code', $code);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo 'Your approximate wait time is ' . $result['wait_time'] . ' minutes.';
    } else {
        echo 'Patient not found.';
    }
} else {
    echo 'Invalid request method.';
}
?>


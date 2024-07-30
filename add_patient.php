<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $code = $_POST['code'];
    $severity = $_POST['severity'];
    $wait_time = $_POST['wait_time'];

    $query = 'INSERT INTO patients (name, code, severity, wait_time) VALUES (:name, :code, :severity, :wait_time)';
    $stmt = $pdo->prepare($query);

    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':code', $code);
    $stmt->bindParam(':severity', $severity);
    $stmt->bindParam(':wait_time', $wait_time);

    if ($stmt->execute()) {
        echo 'Patient added successfully!';
    } else {
        echo 'Failed to add patient.';
    }
} else {
    echo 'Invalid request method.';
}
?>


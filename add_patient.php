<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['patient-name'];
    $severity = $_POST['severity'];
    $code = substr(strtoupper($name), 0, 3);

    try {
        $stmt = $pdo->prepare("INSERT INTO patients (name, severity, code) VALUES (:name, :severity, :code)");
        $stmt->execute(['name' => $name, 'severity' => $severity, 'code' => $code]);
        echo "Patient added successfully.";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

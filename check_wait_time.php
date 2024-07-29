<?php
require 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $code = strtoupper($_POST['code']);

    try {
        $stmt = $pdo->prepare("SELECT * FROM patients WHERE name = :name AND code = :code");
        $stmt->execute(['name' => $name, 'code' => $code]);
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($patient) {
            $arrivalTime = new DateTime($patient['arrival_time']);
            $now = new DateTime();
            $waitTime = $now->diff($arrivalTime)->i; // Difference in minutes
            echo "Approximate wait time for $name ($code): $waitTime minutes";
        } else {
            echo "Patient not found";
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

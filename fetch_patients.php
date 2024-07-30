<?php
require 'db_config.php';

try {
    $query = 'SELECT name, code, severity, wait_time FROM patients';
    $stmt = $pdo->prepare($query);
    $stmt->execute();
    $patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode(['patients' => $patients]);
} catch (PDOException $e) {
    echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
}
?>

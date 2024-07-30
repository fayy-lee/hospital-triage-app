<?php
include 'db_config.php';

$patient_id = $_POST['patient_id'];
$new_wait_time = $_POST['wait_time'];

$sql = "UPDATE patients SET wait_time = :wait_time WHERE id = :patient_id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['wait_time' => $new_wait_time, 'patient_id' => $patient_id]);

echo json_encode(['status' => 'success']);
?>


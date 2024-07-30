<?php
require 'db_config.php';

$query = 'SELECT * FROM patients ORDER BY id';
$stmt = $pdo->prepare($query);
$stmt->execute();
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($patients) {
    echo '<ul>';
    foreach ($patients as $patient) {
        echo '<li>' . htmlspecialchars($patient['name']) . ' (Code: ' . htmlspecialchars($patient['code']) . ', Wait Time: ' . htmlspecialchars($patient['wait_time']) . ' mins)</li>';
    }
    echo '</ul>';
} else {
    echo 'No patients found.';
}
?>

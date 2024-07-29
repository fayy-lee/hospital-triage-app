<?php
require 'db_config.php';

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $code = $_POST['code'];

    // Prepare and execute the SQL query to fetch the wait time
    $query = 'SELECT wait_time FROM patients WHERE name = :name AND code = :code';
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':code', $code);

    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        echo 'Approximate wait time: ' . $result['wait_time'];
    } else {
        echo 'No wait time found for the given patient details.';
    }
} else {
    echo 'Invalid request method.';
}
?>

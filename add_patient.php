<?php
require 'db_connect.php'; // Ensure you have the correct path to your DB connection script

// Check if form data is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and sanitize input
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $code = filter_input(INPUT_POST, 'code', FILTER_SANITIZE_STRING);
    $severity = filter_input(INPUT_POST, 'severity', FILTER_VALIDATE_INT);
    $wait_time = filter_input(INPUT_POST, 'wait_time', FILTER_VALIDATE_INT);

    if ($name && $code && $severity !== false && $wait_time !== false) {
        try {
            // Prepare and execute the SQL query to insert a new patient
            $query = 'INSERT INTO patients (name, code, severity, wait_time) VALUES (:name, :code, :severity, :wait_time)';
            $stmt = $pdo->prepare($query);

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':code', $code);
            $stmt->bindParam(':severity', $severity);
            $stmt->bindParam(':wait_time', $wait_time);

            if ($stmt->execute()) {
                echo json_encode(['status' => 'success', 'message' => 'Patient added successfully!']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to add patient.']);
            }
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Invalid input data.']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method.']);
}
?>

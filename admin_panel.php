<?php
session_start(); // Start the session

// Check if admin is logged in
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: index.html'); // Redirect to login page if not logged in
    exit();
}

require 'db_config.php';

// Fetch the list of patients
$query = 'SELECT * FROM patients';
$stmt = $pdo->prepare($query);
$stmt->execute();
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Hospital Triage Application</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Admin Panel</h1>
        <nav>
            <ul>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <section id="patient-list">
        <h2>Patient List</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Code</th>
                    <th>Severity</th>
                    <th>Wait Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($patients as $patient): ?>
                <tr>
                    <td><?php echo htmlspecialchars($patient['id']); ?></td>
                    <td><?php echo htmlspecialchars($patient['name']); ?></td>
                    <td><?php echo htmlspecialchars($patient['code']); ?></td>
                    <td><?php echo htmlspecialchars($patient['severity']); ?></td>
                    <td><?php echo htmlspecialchars($patient['wait_time']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section id="add-patient">
        <h2>Add New Patient</h2>
        <form action="add_patient.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="code">Code:</label>
            <input type="text" id="code" name="code" required>
            <label for="severity">Severity:</label>
            <input type="number" id="severity" name="severity" required>
            <label for="wait_time">Wait Time:</label>
            <input type="number" id="wait_time" name="wait_time">
            <button type="submit">Add Patient</button>
        </form>
    </section>
</body>
</html>

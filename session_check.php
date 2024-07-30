<?php
session_start();

if (isset($_SESSION['admin'])) {
    echo json_encode(['loggedIn' => true, 'admin' => $_SESSION['admin']]);
} else {
    echo json_encode(['loggedIn' => false]);
}
?>

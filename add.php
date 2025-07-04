<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = trim($_POST['description'] ?? '');

    if ($description !== '') {
        $stmt = $mysqli->prepare("INSERT INTO todo_items (description) VALUES (?)");
        $stmt->bind_param("s", $description);
        $stmt->execute();
    }
}

header("Location: index.php");
exit;

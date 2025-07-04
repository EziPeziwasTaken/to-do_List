<?php
require 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'] ?? null;

    if ($id) {
        // Přepnutí stavu pomocí jednoho dotazu
        $stmt = $mysqli->prepare("UPDATE todo_items SET is_done = NOT is_done WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }
}

header("Location: index.php");
exit;

<?php
require 'connect.php';

$result = $mysqli->query("SELECT * FROM todo_items ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>To-Do List v PHP (MySQLi)</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h1>📝 Můj To-Do List</h1>

    <form action="add.php" method="POST" class="mb-3 d-flex gap-2">
        <input type="text" name="description" class="form-control" placeholder="Nový úkol..." required>
        <button class="btn btn-primary">Přidat</button>
    </form>

    <?php while ($task = $result->fetch_assoc()): ?>
        <div class="d-flex justify-content-between align-items-center border p-2 mb-2 <?= $task['is_done'] ? 'bg-light text-muted' : '' ?>">
            <form action="toggle.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <button class="btn btn-sm <?= $task['is_done'] ? 'btn-success' : 'btn-outline-success' ?>">
                    <?= $task['is_done'] ? '✔️' : '✅' ?>
                </button>
            </form>
            <span style="flex:1; margin-left:10px; <?= $task['is_done'] ? 'text-decoration: line-through;' : '' ?>">
                <?= htmlspecialchars($task['description']) ?>
            </span>
            <form action="delete.php" method="POST" class="d-inline">
                <input type="hidden" name="id" value="<?= $task['id'] ?>">
                <button class="btn btn-sm btn-danger">🗑️</button>
            </form>
        </div>
    <?php endwhile; ?>
</body>
</html>

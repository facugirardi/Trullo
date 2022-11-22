<?php
require "connection.php";

$task_title = $_POST['task_title'];
$column_id = $_POST['column_id'];

$sql = "INSERT INTO tareas (titulo, columna_id) VALUES (:task_title, :column_id)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":task_title", $task_title);
$stmt->bindParam(":column_id", $column_id);
$stmt->execute();
echo "Tarea insertada correctamente";
?>

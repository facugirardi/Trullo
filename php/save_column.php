<?php
require "connection.php";

$column_name = $_POST['col_name'];
$column_order = $_POST['col_order'];

$sql = "INSERT INTO columnas (nombre, orden) VALUES (:column_name, :column_order)";
$stmt = $conn->prepare($sql);
$stmt->bindParam(":column_name", $column_name);
$stmt->bindParam(":column_order", $column_order);
$stmt->execute();
echo "Columna agregada";

?>
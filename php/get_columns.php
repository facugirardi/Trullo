<?php
require "connection.php";

$sql = "SELECT * FROM columnas ORDER BY orden ASC";
$stmt = $conn->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
?>


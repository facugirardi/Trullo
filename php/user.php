<?php
session_start();
if (isset($_SESSION["user_id"])){
    $records = $conn->prepare("SELECT id, nombre, email, contrasenia FROM usuarios WHERE id=:id");
    $records->bindParam(":id", $_SESSION["user_id"]);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $user = null;
    if (count($results) > 0 ){
        $user = $results;
    }
}

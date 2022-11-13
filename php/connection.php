<?php
    $server = "thejorgecompany.com.ar";
    $username = "thejorgecompany_trullo";
    $password = "OCTA2863FACU";
    $dbname = "thejorgecompany_trullo";

    try {
        $conn = new PDO("mysql:host=$server;dbname=$dbname;", $username, $password);
      } catch (PDOException $e) {
        die('Connection Failed: ' . $e->getMessage());
    }





<?php
    require "../php/connection.php";

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
else {
    header("location: log-in.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project - Trullo</title>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@100;200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/project.css">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../assets/tlogo.png">


</head>


<body>
    <header class="header">
        <div class="logo">
            <a href="../index.php">
                <img src="../assets/trullo-logo.png" alt="trullo-logo">
            </a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="why.php">WHY TRULLO?</a></li>
                <li><a href="prices.php">PRICES</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="about.php">ABOUT US</a></li>
            </ul>
        </nav>

        <div class="buttons">
            <a href="" class="log-in-btn">PROJECTS</a>
            <?php if (!empty($user)):?>
                <a href="profile.php" class="sign-in-btn"> <?= strtoupper($user["nombre"])?></a>
            <?php endif;?>
        </div>
    </header>
    <main class="main">
        <div id="addTodoListDiv">
        <input id="addTodoListInput" class="comment">
        <button id="addTodoListButton" class="btn-save">Add new list</button>
        </div>
        <div id="root"></div>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
    <script src="../js/main.js"></script>
</body>
</html>
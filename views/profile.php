<?php

require "../php/connection.php";

require "../php/user.php";
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
        <a href="project.php" class="log-in-btn">PROJECTS</a>
        <?php if (!empty($user)):?>
            <a href="profile.php" class="sign-in-btn"> <?= strtoupper($user["nombre"])?></a>
        <?php endif;?>
    </div>
</header>
    <main class="main">
        <div class="main-div">
            <img src="../assets/user-icon.png" alt="user-icon">
            
            <div class="main-content">
                <div class="user-info">
                    <h1>User:&nbsp;<?= $user["nombre"]?></h1>
                </div>
                <div class="email-info">
                    <h3>E-Mail:&nbsp;<?= $user["email"] ?></h3>
                </div>

                <a href="../php/logout.php">Log out</a>
            </div>
        </div>
    </main>
</body>
</html>
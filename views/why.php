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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@100;200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../assets/tlogo.png">
    <title>Why Trullo?</title>

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
                <li><a href="why.html">WHY TRULLO?</a></li>
                <li><a href="prices.php">PRICES</a></li>
                <li><a href="contact.php">CONTACT US</a></li>
                <li><a href="about.php">ABOUT US</a></li>
            </ul>
        </nav>
        <div class="buttons">
            <?php if(!empty($user)): ?>
                <a href="project.php" class="log-in-btn">PROJECTS</a>
                <a href="profile.php" class="sign-in-btn"> <?= strtoupper($user["nombre"])?></a>
            <?php else: ?>
                <a href="log-in.php" class="log-in-btn">LOGIN</a>
                <a href="register.php" class="sign-in-btn">REGISTER</a>
            <?php endif; ?>
        </div>
    </header>
    <main>
        <div class="main">
            <div class="titles">
            <h1 class="title">Why Trullo?</h1>
            <p class="subtitle2">Trullo is a collaboration tool that organizes your projects<br>into boards. In one glance, Trullo tells you what's being<br>worked on, who's working on what, and where something<br>is in a process. Imagine a white board, filled with lists of<br>sticky notes, with each note as a task for you and your team.</p>
            </div>
            <div class="circle"></div>
            <div class="bar"></div>
        </div>    
    </main>
    <script src="../js/log.js"></script>
</body>
</html>
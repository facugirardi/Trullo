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
    <title>Contact Us</title>

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
        <div class="titles">
        <h1 class="title2">Let's chat.<br>Tell us what is<br>going on.</h1>
        <p class="subtitle3">Let's get in touch.</p>
        </div>
        <div class="form-cn">
        <form class="form-contact" action="https://formsubmit.co/3553a41246a16c455ecc7510c6faa638" method="POST">
            <h2 class="h2-cn">CONTACT US</h2>
            <p type="Name:" class="p-cn"><input placeholder="Write your name here..." class="input-cn" id="name" name="name" required ></input></p>
            <p type="Email:" class="p-cn"><input placeholder="Write your e-mail..." class="input-cn" id="email" name="email" required></input></p>
            <p type="Message:" class="p-cn" ><input placeholder="What would you like to tell us..." class="input-cn" name="message" id="message" required></input></p>
            <button class="get-btn btn-cn" type="sumbit">Send Message</button>
          </form>
          </div>
    </main>
    <script src="https://smtpjs.com/v3/smtp.js"></script>
    <script src="../js/contact.js"></script>
    <script src="../js/log.js"></script>
</body>
</html>
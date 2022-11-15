<?php
    require "../php/connection.php";

    session_start();
    if (!empty($_POST["usuario"]) && !empty($_POST["password"])){
        $records = $conn->prepare("SELECT id, nombre, email, contrasenia FROM usuarios WHERE nombre=:usuario");
        $records->bindParam(":usuario", $_POST["usuario"]);
        $records->execute();
        $results = $records->fetch(PDO::FETCH_ASSOC);

        $message = "";

        if (password_verify($_POST["password"], $results["contrasenia"])){
            $_SESSION["user_id"] = $results["id"];
            header("location: /Trullo/views/project.php");
        } else {
            $message = "Sorry, those credentials do not match";
        }

    }


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
    <link rel="stylesheet" href="../css/register.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="icon" href="../assets/tlogo.png">
    <title>Log In - Trullo</title>

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
            <a href="log-in.php" class="log-in-btn">LOGIN</a>
            <a href="register.php" class="sign-in-btn">REGISTER</a>
        </div>
    </header>
    <main> 
        <div class="register-section">
            <div id="heading-2">
                <h2>LOG IN</h2>
            </div>
            <?php if (!empty($message)):?>
                <p class="php-message"><?= $message ?></p>
            <?php endif; ?>
            <form method="post" action="log-in.php">
                <section class="inputs-labels">
                    <div class="usuario">
                        <label for="inputUsuariolg">User</label>
                        <input type="text" id="inputUsuariolg" placeholder="Username"
                        name="usuario" >
                    </div>
                    <div class="contrasenia">
                        <label for="inputContrasenialg">Password</label>
                        <input type="password" id="inputContrasenialg" placeholder="Password"
                        name="password" >
                    </div>
                </section>
                <button class="get-btn btnsend">Send</button>
            </form>
        </div>
    </main>

</body>
</html>
<?php
    require "../php/connection.php";

    $message = '';

    if (!empty($_POST["usuario"]) && !empty($_POST["email"]) && !empty($_POST["password"])){
        $sql = "INSERT INTO usuarios (nombre, email, contrasenia) VALUES (:nombre, :email, :password)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":nombre", $_POST["usuario"]);
        $stmt->bindParam(":email", $_POST["email"]);
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $password);

        if ($stmt->execute()){
            $message = "Successfully created new user";
        } else {
            $message = "Something went wrong during the registration";
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
    <title>Register - Trullo</title>

</head>
<body>
    <header class="header">
        <div class="logo">
            <a href="../index.html">
                <img src="../assets/trullo-logo.png" alt="trullo-logo">
            </a>
        </div>
        <nav>
            <ul class="nav-links">
                <li><a href="why.html">WHY TRULLO?</a></li>
                <li><a href="prices.html">PRICES</a></li>
                <li><a href="contact.html">CONTACT US</a></li>
                <li><a href="about.html">ABOUT US</a></li>
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
                <h2>REGISTER</h2>
            </div>
            <?php if(!empty($message)): ?>
                <p class="php-message"> <?= $message ?> </p>
            <?php endif; ?>
            <form action="register.php" method="post">
                <section class="inputs-labels">
                    <div class="usuario">
                        <label for="inputUsuario">User</label>
                        <input type="text" id="inputUsuario" placeholder="Enter your username"
                        name="usuario">
                    </div>
                    <div class="usuario">
                        <label for="inputEmail">E-Mail</label>
                        <input type="email" id="inputEmail" placeholder="Enter your email"
                        name="email">
                    </div>
                    <div class="contrasenia">
                        <label for="inputContrasenia">Password</label>
                        <input type="password" id="inputContrasenia" placeholder="Enter your password"
                        name="password">
                    </div>
                </section>
                <input type="submit" value="Send" class="get-btn btnsend">
            </form>
            
        </div>
    </main>
</body>
</html>
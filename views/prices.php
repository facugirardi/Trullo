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
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link rel="icon" href="../assets/tlogo.png">
    <title>Prices - Trullo</title>

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
        <div class="containerp">
        <div class="wrapper">
            <div class="table basic">
              <div class="head_tab"><h2>Standard<br>Trullo</h2></div>
              <div class="aj_p"><p>Ideal solution for beginners</p></div>
              <div class="price-section">
                <div class="price-area">
                  <div class="inner-area">
                    <span class="text">$</span>
                    <span class="price">9.99<span style="font-size:12px">/mo</span></span>
        
                  </div>
                </div>
              </div>
              <div class="package-name"></div>
              <ul class="features">
                <div class="btn"><button>Buy</button></div>
                <p class="aj_des">$14.99/mo when you renew</p>
                <li>
                  <span class="list-name">10 Projects</span>
                  <span class="icon check"><i class="fas fa-check"></i></span>
                </li>
                <li>
                  <span class="list-name">Work With Collaborators</span>
                  <span class="icon cross"><i class="fas fa-times"></i></span>
                </li>
                <li>
                  <span class="list-name">1GB of Memory</span>
                  <span class="icon cross"><i class="fas fa-check"></i></span>
                </li>
                <li>
                  <span class="list-name">Workspace Personalization</span>
                  <span class="icon check"><i class="fas fa-times"></i></span>
                </li>
              </ul>
            </div>
            <div class="table premium">
              <div class="head_tab"><h2>Premium <br>Trullo</h2></div>
              <div class="aj_p"><p>Perfect package for companies</p></div>
              <div class="ribbon"><span>BEST VALUE</span></div>
              <div class="price-section">
                <div class="price-area">
                  <div class="inner-area">
                    <span class="text">$</span>
                    <span class="price">99.99<span style="font-size:12px">/mo</span></span>
                  </div>
                </div>
              </div>
              <div class="package-name"></div>
              <ul class="features">
                <div class="btn"><button>Buy</button></div>
                <p class="aj_des">$119.99/mo when you renew</p>
                <li>
                  <span class="list-name">Unlimited Projects</span>
                  <span class="icon check"><i class="fas fa-check"></i></span>
                </li>
                <li>
                  <span class="list-name">Work With Collaborators</span>
                  <span class="icon check"><i class="fas fa-check"></i></span>
                </li>
                <li>
                  <span class="list-name">Unlimited Memory</span>
                  <span class="icon check"><i class="fas fa-check"></i></span>
                </li>
                <li>
                  <span class="list-name">Workspace Personalization</span>
                  <span class="icon check"><i class="fas fa-check"></i></span>
                </li>
              </ul>
            </div>
            <div class="table ultimate">
              <div class="head_tab"><h2>Ultimate <br>Trullo</h2></div>
              <div class="aj_p"><p>Perfect package for developers</p></div>
              <div class="price-section">
                <div class="price-area">
                  <div class="inner-area">
                    <span class="text">$</span>
                    <span class="price">59.99<span style="font-size:12px">/mo</span></span>
                  </div>
                </div>
              </div>
              <div class="package-name"></div>
              <ul class="features">
                <div class="btn"><button>Buy</button></div>
                <p class="aj_des">$74.99/mo when you renew</p>
                <li>
                  <span class="list-name">25 Projects</span>
                  <span class="icon check"><i class="fas fa-check"></i></span>
                </li>
                <li>
                  <span class="list-name">Work With Collaborators</span>
                  <span class="icon check"><i class="fas fa-check"></i></span>
                </li>
                <li>
                  <span class="list-name">100GB of Memory</span>
                  <span class="icon check"><i class="fas fa-check"></i></span>
                </li>
                <li>
                  <span class="list-name">Workspace Personalization</span>
                  <span class="icon cross"><i class="fas fa-times"></i></span>
                </li>
              </ul>
            </div>
          </div>
        </div>

    </main>
<script src="../js/log.js"></script>
</body>
</html>
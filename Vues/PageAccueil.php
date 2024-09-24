<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Les tenrac</title>
  <link rel="stylesheet" href="../CSS/Style.css">
  <script src="../JavaScript/script.js"></script>
    <link rel="icon" href="../Images/tenracIcon.ico" />
</head>
    <body>
        <header>
            <div>
                <nav>
                    <a href="./Connexion.php">Connexion</a>
                </nav>
            </div>
            <a href="./PageAccueil.php"><img id="logo" src="../Images/Slider1.jpg"></a>
            <nav>
                <ol>
                    <li><a href="./PageAccueil.php">Accueil</a></li>
                    <li><a href="./Plat.php">Plat</a></li>
                    <li><a href="./Repas.php">Repas</a></li>
                </ol>
            </nav>
        </header>
        <div id="slider">
            <div class="slide" id="slide3">
                <img class="img" src="../Images/Slider3.jpg">
            </div>
            <div class="slide" id="slide2">
                <img class="img" src="../Images/Slider2.jpg">
            </div>
            <div class="slide" id="slide1">
                <img class="img" src="../Images/Slider1.jpg">
            </div>
            <button class="slidebutton left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="slidebutton right" onclick="plusDivs(1)">&#10095;</button>
            <p id="slidecounter">Page</p>
        </div>
        <main>
            
        </main>
        <footer>
            
        </footer>
    </body>
</html>


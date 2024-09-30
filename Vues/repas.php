<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Les tenrac</title>
  <link rel="stylesheet" href="style.css">
  <script src="script.js"></script>
</head>
    <body>
        <header>
            <div>
                <nav>
                    <a href="./Connexion.php">Connexion</a>
                </nav>
            </div>
            <a href="Accueil.php"><img id="logo" src=""></a>
            <nav>
                <ol>
                    <li><a href="Accueil.php">Accueil</a></li>
                    <li><a href="./Plat.php">Plat</a></li>
                    <li><a href="./Repas.php">Repas</a></li>
                </ol>
            </nav>
        </header>
        <div id="slider">
            <div class="slide" id="slide0">
                <img class="img" src="">
            </div>
            <div class="slide" id="slide1">
                <a class="img imgContain" href=""><img src=""></a>
            </div>
            <button class="slidebutton left" onclick="plusDivs(-1)">&#10094;</button>
            <button class="slidebutton right" onclick="plusDivs(1)">&#10095;</button>
            <p id="slidecounter">Page</p>
        </div>
        <main>
            <?php
            foreach ($repas as $repas) {
                echo $repas['???']
            }
            ?>
        </main>
        <footer>

        </footer>
    </body>
</html>


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
        
        <main>
            <form action="/ma-page-de-traitement" method="post">
              <ul>
                <li>
                    <label for="name">Nom</label>
                    <input type="text" id="name" name="tenrac_name" required="required"/>
                </li>
                <li>
                    <label for="email">E-mail</label>
                    <input type="email" name="tenrac_email" id="email" required="required"/>
                </li>
                <li>
                    <label for="telephone">Telephone</label>
                    <input type="tel" name="tenrac_telephone" id="telephone" required="required"/>
                </li>
                <li>
                    <label for="addresse">Addresse</label>
                    <input type="text" name="tenrac_addresse" id="addresse" required="required"/>
                </li>
                <li>
                    <label for="sexe">Sexe</label><br>
                    <label>Homme</label>
                    <input type="radio" name="sexe" value="H" checked><br>
                    <label>Femme</label>
                    <input type="radio" name="sexe" value="F" >
                </li>
                <li>
                <input type="submit" value="Envoyer">
                <input type="reset" value="Effacer">
                </li>
              </ul>
            </form>
        </main>
        <footer>

        </footer>
    </body>
</html>


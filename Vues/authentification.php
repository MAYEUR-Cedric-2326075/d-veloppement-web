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
            <a href="./PageAccueil.php"><img id="logo" src=""></a>
            <nav>
                <ol>
                    <li><a href="./PageAccueil.php">Accueil</a></li>
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
                  <input type="text" id="name" name="user_name_login" required="required"/>
                </li>
                <li>
                  <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp_login" id="mdp" required="required"/>
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


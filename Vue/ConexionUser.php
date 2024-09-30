<?php
include 'fonctions.php';
?>


<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Les tenrac</title>
    <link rel="stylesheet" href="../CSS/Style.css">
    <script src="../JavaScript/script.js"></script>
    <link rel="icon" href="../Images/Logo.ico" />
</head>
<body>
<?php
header_page();
?>
<main>
    <a href="./Accueil.php"><img id="logoConnect" src="../Images/Logo.webp"></a>
    <form class="corps" action="/intranet.html" method="post" enctype="text/plain">
        <h1>Connexion</h1>
        <label for="Identifiant">Identifiant :</label>
        <input id="Identifiant" type="text" name="Identifiant" value="" required="required"><br>

        <label for="mot de passe">Mot de passe :</label>
        <input id="mot de passe" type="password" name="mot de passe" value="" required="required""><br>

        <!-- <input id="send" class="envoi" type="submit" value="Envoyer"> -->
        <a class="button" id="send" href="/intranet.html">Envoyer</a>
    </form>
</main>
<footer>

</footer>
</body>
</html>
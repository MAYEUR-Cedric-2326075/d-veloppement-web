<?php
function header_page() : void{
    ?>
    <header>
        <div>
            <nav>
                <a href="../Controleur/ConexionUserControler.php">Connexion</a>
            </nav>
        </div>
        <a href="../Controleur/PageAccueilControler.php"><img id="logo" src="/Images/Logo.webp"></a>
        <nav>
            <ol>
                <img id="logoPrinc" src="../Images/Logo.webp">
                <li><a href="../Controleur/PageAccueilControler.php">Accueil</a></li>
                <li><a href="../Controleur/IncriptionControlerUser.php">Inscription</a></li>
                <li><a href="../Controleur/ClubControler.php">Clubs</a></li>
            </ol>
        </nav>
    </header>
    <?php
}
?>

<?php
function haut_page() : void{
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
}
?>

<?php
function bas_page() : void{
?>
<footer>
    SIMON Louis, DELIN Maxime, MAYEUR Cedric, DARIETTO Nicolas, MINIERE Mathias
</footer>
</body>
</html>
<?php
}
?>

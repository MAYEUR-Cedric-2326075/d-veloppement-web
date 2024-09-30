<?php
function header_page() : void{
?>
    <header>
        <div>
            <nav>
                <a href="./ConexionUser.php">Connexion</a>
            </nav>
        </div>
        <a href="./PageAccueil.php"><img id="logo" src="../Images/Logo.webp"></a>
        <nav>
            <ol>
                <li><a href="./PageAccueil.php">Accueil</a></li>
                <li><a href="./Plat.php">Plat</a></li>
                <li><a href="./Repas.php">Repas</a></li>
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

</footer>
</body>
</html>
<?php
}
?>

<?php
function header_page() : void{
?>
    <header>
        <div>
            <nav>
                <a href="./ConexionUser.php">Connexion</a>
            </nav>
        </div>
        <a href="Accueil.php"><img id="logo" src="../Images/Logo.webp"></a>
        <nav>
            <ol>
                <li><a href="Accueil.php">Accueil</a></li>
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
<html style="font-size: 16px;" lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="Tenrac, Tenders, Raclette"
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

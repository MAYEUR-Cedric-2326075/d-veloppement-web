<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Site Web</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php Vue::montrer('Standard/haut'); ?> <!-- Inclusion de l'en-tête -->

<main>
    <?php echo $body; ?>
</main>

<?php Vue::montrer('Standard/bas'); ?> <!-- Inclusion du pied de page -->
</body>
</html>

<script src="./JavaScript/Script.js"></script>

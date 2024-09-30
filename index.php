<?php
include 'fonctions.php';

require 'Noyau/ChargementAuto.php';

session_start();

$S_urlADecortiquer = isset($_GET['url']) ? $_GET['url'] : null;
if (!$S_urlADecortiquer) {
    $S_urlADecortiquer = 'Accueil';
}
$A_postParams = isset($_POST) ? $_POST : null;

Vue::ouvrirTampon();

try  {
    $O_controleur = new Controleur($S_urlADecortiquer, $A_postParams);
    $O_controleur->executer();
}
catch (ControleurException $O_exception)  {
    echo ('Une erreur s\'est produite : ' . $O_exception->getMessage());
}

$contenuPourAffichage = Vue::recupererContenuTampon();

if (!isset($_SESSION['afficherGabarit']) || $_SESSION['afficherGabarit']) {
    Vue::montrer('gabarit', array('body' => $contenuPourAffichage));
} else {
    echo $contenuPourAffichage;
    $_SESSION['afficherGabarit'] = true;
}
?>

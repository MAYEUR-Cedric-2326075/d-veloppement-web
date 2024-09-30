<?php

require_once '../Modele/ModeleTenrac.php';
require_once '../Vues/ViewTenrac.php';

class TenracController {

    private $modele;

    public function __construct() {
        // Initialise le modèle
        $this->modele = new ModeleTenrac();
    }

    // Méthode pour afficher tous les Tenrac
    public function showAll() {
        // Récupère tous les enregistrements de la table Tenrac depuis le modèle
        $tenracList = $this->modele->getAllTenrac();

        // Initialise la vue avec les données récupérées
        $view = new ViewTenrac($tenracList);

        // Affiche la vue
        $view->show();
    }

    // Méthode pour afficher un Tenrac en particulier (par ID)
    public function showById(int $id_tenrac) {
        // Récupère les données spécifiques du Tenrac
        $tenrac = $this->modele->getTenracById($id_tenrac);

        // Initialise la vue avec les données récupérées
        $view = new ViewTenrac([$tenrac]); // Tableau avec un seul élément

        // Affiche la vue
        $view->show();
    }
}

// Test du contrôleur
$testController = new TenracController();
$testController->showAll(); // Pour afficher tous les Tenrac
?>

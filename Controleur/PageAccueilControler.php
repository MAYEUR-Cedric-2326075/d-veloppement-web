<?php
require_once 'View/PageAccueil.php';  // Inclure la vue

class PageAccueilControler {

    private $view;  // Stocke la vue de la page d'accueil

    public function __construct() {
        $this->view = new PageAccueil();  // Initialise la vue
    }

    // Méthode pour afficher la page d'accueil
    public function afficherPageAccueil(): void {
        // Afficher la page d'accueil en appelant la méthode show() de la vue
        $this->view->show();
    }
}

// Exemple d'utilisation du contrôleur
$controler = new PageAccueilControler();
$controler->afficherPageAccueil();
?>

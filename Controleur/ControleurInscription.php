<?php
require 'Noyau/ChargementAuto.php';
include_once '../Modele/ModeleTenrac.php';

class ControleurInscription {
    private $A_postParams;

    public function __construct($A_postParams) {
        $this->A_postParams = $A_postParams;
    }

    public function executer() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->traiterInscription();
        } else {
            $this->afficherFormulaire();
        }
    }

    private function traiterInscription() {
        $username = trim($this->A_postParams['username']);
        $email = trim($this->A_postParams['email']);
        $password = trim($this->A_postParams['password']);
        $confirmPassword = trim($this->A_postParams['confirm_password']);

        $erreurs = [];

        if (empty($username)) {
            $erreurs[] = 'Le nom d\'utilisateur est requis.';
        }

        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $erreurs[] = 'Un email valide est requis.';
        }

        if (empty($password)) {
            $erreurs[] = 'Le mot de passe est requis.';
        }

        if ($password !== $confirmPassword) {
            $erreurs[] = 'Les mots de passe ne correspondent pas.';
        }

        if (!empty($erreurs)) {
            foreach ($erreurs as $erreur) {
                echo "<p style='color:red;'>$erreur</p>";
            }
            $this->afficherFormulaire();
            return;
        }

        createTenrac($mail_tenrac, $name, $surname, );
        // Ici, vous pouvez ajouter le code pour enregistrer l'utilisateur dans la base de données
        // Exemple (en supposant que vous avez une méthode pour ajouter un utilisateur) :
        // $this->ajouterUtilisateur($username, $email, $password);

        // Après l'ajout, rediriger ou afficher un message de succès
        echo "<p style='color:green;'>Inscription réussie !</p>";
        // Rediriger ou afficher la vue de confirmation si nécessaire
    }

    private function afficherFormulaire() {
        // Inclure le fichier de vue d'inscription
        Vue::montrer('Inscription'); // Assurez-vous que 'Inscription' correspond au nom de votre vue
    }
}
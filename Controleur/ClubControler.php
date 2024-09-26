<?php

require_once 'Noyau/ConnexionBD.php';
require_once 'Modele/ModeleClub.php';

class ClubController {
    private $clubModel;

    public function __construct($db) {
        $this->clubModel = new ClubModel($db);
    }

    public function createClub($data) {
        if (!isset($data['denomination']) || !isset($data['codePostal'])) {
            return "Champs denomination et codePostal obligatoires.";
        }

        $this->clubModel->createClub($data);
        return "Club créé.";
    }

    public function getClub($id) {
        $club = $this->clubModel->getClubById($id);

        if ($club) {
            return $club;
        } else {
            return "Club non trouvé.";
        }
    }

    public function getAllClubs() {
        return $this->clubModel->getAllClubs();
    }

    public function updateClub($id, $data) {
        if (!isset($data['denomination']) || !isset($data['codePostal'])) {
            return "Champs denomination et codePostal obligatoires.";
        }

        $updated = $this->clubModel->updateClub($id, $data);
        if ($updated) {
            return "Club mis à jour.";
        } else {
            return "Erreur.";
        }
    }

    public function deleteClub($id) {
        $deleted = $this->clubModel->deleteClub($id);

        if ($deleted) {
            return "Club supprimé.";
        } else {
            return "Erreur.";
        }
    }
}


?>

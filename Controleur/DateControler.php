<?php

require_once 'Noyau/ConnexionBD.php';
require_once 'Modele/ModeleDate.php';

class DateController {

    private $dateModel;


    public function __construct($db) {

        $this->dateModel = new DateModel($db);
    }


    public function createDate($data) {

        if (!isset($data['dat'])) {
            return "Champ date obligatoire.";
        }

        $data['dat'] = date('Y-m-d', strtotime($data['dat']));

        $this->dateModel->createDate($data);
        return "Date créée.";
    }


    public function getDateById($id) {

        if (!is_numeric($id)) {
            return "ID invalide.";
        }

        $date = $this->dateModel->getDateById($id);
        if ($date) {
            return $date;
        } else {
            return "Date non trouvée.";
        }
    }


    public function getAllDates() {

        return $this->dateModel->getAllDates();
    }


    public function updateDate($id, $data) {

        if (!is_numeric($id)) {
            return "ID invalide.";
        }

        if (!isset($data['dat'])) {
            return "Champ date obligatoire.";
        }

        $data['dat'] = date('Y-m-d', strtotime($data['dat']));

        $updated = $this->dateModel->updateDate($id, $data);
        if ($updated) {
            return "Date mise à jour.";
        } else {
            return "Erreur de la mise à jour de la date.";
        }
    }


    public function deleteDate($id) {

        if (!is_numeric($id)) {
            return "ID invalide.";
        }

        $deleted = $this->dateModel->deleteDate($id);
        if ($deleted) {
            return "Date supprimée.";
        } else {
            return "Erreur suppression de la date.";
        }
    }
}

?>

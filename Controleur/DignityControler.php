<?php

require_once 'Noyau/ConnexionBD.php'; // Assurez-vous que ce fichier contient la logique pour se connecter à la base de données.

class DignityControler {

    private $pdo;


    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }


    public function createEntry($data) {

        if (!isset($data['libelle'])) {
            return "Le libellé de la dignité est obligatoire.";
        }


        $sql = "INSERT INTO Dignity (libelle_dignity) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);

        if ($stmt->execute()) {
            return "La dignité a été créée avec succès.";
        } else {
            return "Erreur lors de la création de la dignité.";
        }
    }


    public function getEntry($id) {

        if (!is_numeric($id)) {
            return "ID invalide.";
        }

        $sql = "SELECT * FROM Dignity WHERE id_dignity = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $result = $stmt->fetch();
        if ($result) {
            return $result;
        } else {
            return "Dignité non trouvée.";
        }
    }


    public function getAllEntries() {

        $sql = "SELECT * FROM Dignity";
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll();
    }


    public function updateEntry($data) {

        if (!isset($data['id_dignity']) || !is_numeric($data['id_dignity'])) {
            return "ID de dignité invalide.";
        }

        if (!isset($data['libelle'])) {
            return "Le libellé de la dignité est obligatoire.";
        }


        $sql = "UPDATE Dignity SET libelle_dignity = :libelle WHERE id_dignity = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        $stmt->bindParam(':id', $data['id_dignity'], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "La dignité a été mise à jour avec succès.";
        } else {
            return "Erreur lors de la mise à jour de la dignité.";
        }
    }


    public function deleteEntry($id) {

        if (!is_numeric($id)) {
            return "ID invalide.";
        }


        $sql = "DELETE FROM Dignity WHERE id_dignity = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "La dignité a été supprimée avec succès.";
        } else {
            return "Erreur lors de la suppression de la dignité.";
        }
    }
}

?>

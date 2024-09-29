<?php

require_once 'Noyau/ConnexionBD.php';

class SauceController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createSauce($data) {
        $sql = "INSERT INTO Sauce (libelle_sauce) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getSauce($id) {
        $sql = "SELECT * FROM Sauce WHERE id_sauce = :id_sauce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_sauce', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllSauces() {
        $sql = "SELECT * FROM Sauce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSauce($id, $data) {
        $sql = "UPDATE Sauce SET libelle_sauce = :libelle WHERE id_sauce = :id_sauce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_sauce', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteSauce($id) {
        $sql = "DELETE FROM Sauce WHERE id_sauce = :id_sauce";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_sauce', $id);
        return $stmt->execute();
    }
}

?>

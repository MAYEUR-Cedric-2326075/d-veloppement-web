<?php

require_once 'Noyau/ConnexionBD.php';

class IngredientController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createIngredient($data) {
        $sql = "INSERT INTO Ingredient (libelle_ingredient) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getIngredient($id) {
        $sql = "SELECT * FROM Ingredient WHERE id_ingredient = :id_ingredient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_ingredient', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllIngredients() {
        $sql = "SELECT * FROM Ingredient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateIngredient($id, $data) {
        $sql = "UPDATE Ingredient SET libelle_ingredient = :libelle WHERE id_ingredient = :id_ingredient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_ingredient', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteIngredient($id) {
        $sql = "DELETE FROM Ingredient WHERE id_ingredient = :id_ingredient";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_ingredient', $id);
        return $stmt->execute();
    }
}

?>

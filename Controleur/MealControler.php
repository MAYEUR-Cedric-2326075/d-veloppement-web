<?php

require_once 'Noyau/ConnexionBD.php';

class MealController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createMeal($data) {
        $sql = "INSERT INTO Meal (dat, address, id_organizer, id_club) VALUES (:dat, :address, :id_organizer, :id_club)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':dat', $data['dat']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':id_organizer', $data['id_organizer']);
        $stmt->bindParam(':id_club', $data['id_club']);
        return $stmt->execute();
    }

    public function getMeal($id) {
        $sql = "SELECT * FROM Meal WHERE id_meal = :id_meal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_meal', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllMeals() {
        $sql = "SELECT * FROM Meal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateMeal($id, $data) {
        $sql = "UPDATE Meal SET dat = :dat, address = :address, id_organizer = :id_organizer, id_club = :id_club WHERE id_meal = :id_meal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_meal', $id);
        $stmt->bindParam(':dat', $data['dat']);
        $stmt->bindParam(':address', $data['address']);
        $stmt->bindParam(':id_organizer', $data['id_organizer']);
        $stmt->bindParam(':id_club', $data['id_club']);
        return $stmt->execute();
    }

    public function deleteMeal($id) {
        $sql = "DELETE FROM Meal WHERE id_meal = :id_meal";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_meal', $id);
        return $stmt->execute();
    }
}

?>

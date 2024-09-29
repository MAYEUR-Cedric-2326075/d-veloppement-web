<?php

require_once 'Noyau/ConnexionBD.php';

class RankController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createRank($data) {
        $sql = "INSERT INTO Rank (libelle_rank) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getRank($id) {
        $sql = "SELECT * FROM Rank WHERE id_rank = :id_rank";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_rank', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllRanks() {
        $sql = "SELECT * FROM Rank";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateRank($id, $data) {
        $sql = "UPDATE Rank SET libelle_rank = :libelle WHERE id_rank = :id_rank";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_rank', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteRank($id) {
        $sql = "DELETE FROM Rank WHERE id_rank = :id_rank";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_rank', $id);
        return $stmt->execute();
    }
}

?>

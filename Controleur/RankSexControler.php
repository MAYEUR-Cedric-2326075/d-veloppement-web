<?php

require_once 'Noyau/ConnexionBD.php';

class RankSexController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createRankSex($data) {
        $sql = "INSERT INTO rankSex (id_rank, id_sex) VALUES (:id_rank, :id_sex)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_rank', $data['id_rank']);
        $stmt->bindParam(':id_sex', $data['id_sex']);
        return $stmt->execute();
    }

    public function getRankSex($id_rank, $id_sex) {
        $sql = "SELECT * FROM rankSex WHERE id_rank = :id_rank AND id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_rank', $id_rank);
        $stmt->bindParam(':id_sex', $id_sex);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllRankSex() {
        $sql = "SELECT * FROM rankSex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteRankSex($id_rank, $id_sex) {
        $sql = "DELETE FROM rankSex WHERE id_rank = :id_rank AND id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_rank', $id_rank);
        $stmt->bindParam(':id_sex', $id_sex);
        return $stmt->execute();
    }
}

?>

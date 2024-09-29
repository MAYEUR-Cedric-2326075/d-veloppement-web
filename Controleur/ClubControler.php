<?php

require_once 'Noyau/ConnexionBD.php';

class ClubController {


    private $pdo;


    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }


    public function createClub($data) {
        $sql = "INSERT INTO Club (codePostal, denomination) VALUES (:codePostal, :denomination)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':codePostal', $data['codePostal']);
        $stmt->bindParam(':denomination', $data['denomination']);
        return $stmt->execute();
    }


    public function getClub($id) {
        $sql = "SELECT * FROM Club WHERE id_club = :id_club";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_club', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function getAllClubs() {
        $sql = "SELECT * FROM Club";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function updateClub($id, $data) {
        $sql = "UPDATE Club SET codePostal = :codePostal, denomination = :denomination WHERE id_club = :id_club";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_club', $id);
        $stmt->bindParam(':codePostal', $data['codePostal']);
        $stmt->bindParam(':denomination', $data['denomination']);
        return $stmt->execute();
    }


    public function deleteClub($id) {
        $sql = "DELETE FROM Club WHERE id_club = :id_club";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_club', $id);
        return $stmt->execute();
    }
}

?>

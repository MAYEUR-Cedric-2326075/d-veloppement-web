<?php

require_once 'Noyau/ConnexionBD.php';

class DateController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createDate($data) {
        $sql = "INSERT INTO Date (date) VALUES (:date)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':date', $data['date']);
        return $stmt->execute();
    }

    public function getDate($id) {
        $sql = "SELECT * FROM Date WHERE id_date = :id_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_date', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllDates() {
        $sql = "SELECT * FROM Date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateDate($id, $data) {
        $sql = "UPDATE Date SET date = :date WHERE id_date = :id_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_date', $id);
        $stmt->bindParam(':date', $data['date']);
        return $stmt->execute();
    }

    public function deleteDate($id) {
        $sql = "DELETE FROM Date WHERE id_date = :id_date";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_date', $id);
        return $stmt->execute();
    }
}

?>

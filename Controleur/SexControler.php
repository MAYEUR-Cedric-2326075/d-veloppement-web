<?php

require_once 'Noyau/ConnexionBD.php';

class SexController {

    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance()->getPdo();
    }

    public function createSex($data) {
        $sql = "INSERT INTO Sex (libelle_sex) VALUES (:libelle)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function getSex($id) {
        $sql = "SELECT * FROM Sex WHERE id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_sex', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getAllSexes() {
        $sql = "SELECT * FROM Sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateSex($id, $data) {
        $sql = "UPDATE Sex SET libelle_sex = :libelle WHERE id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_sex', $id);
        $stmt->bindParam(':libelle', $data['libelle']);
        return $stmt->execute();
    }

    public function deleteSex($id) {
        $sql = "DELETE FROM Sex WHERE id_sex = :id_sex";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':id_sex', $id);
        return $stmt->execute();
    }
}

?>

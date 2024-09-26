<?php

require_once 'Noyau/ConnexionBD.php';
class ModeleClub {
    private $pdo;
    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }


    public function getIdClub($denomination) {
        $query = "SELECT id_club FROM club WHERE denomination = :denomination";
        $stmt =  $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':denomination', $denomination);
        $stmt->execute();
        $idClub = $stmt->fetchColumn();
        return $idClub;
    }


    public function getCodePostal($idClub) {
        $query = "SELECT codePostal FROM club WHERE id_club = :idClub";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':idClub', $idClub);
        $stmt->execute();
        $codePostal = $stmt->fetchColumn();
        return $codePostal;
    }


    public function getDenomination($idClub) {
        $query = "SELECT denomination FROM club WHERE id_club = :idclub";
        $stmt = $this->pdo->getPdo()->prepare($query);
        $stmt->bindValue(':idClub', $idClub);
        $stmt->execute();
        $denomination = $stmt->fetchColumn();
        return $denomination;
    }
}

?>

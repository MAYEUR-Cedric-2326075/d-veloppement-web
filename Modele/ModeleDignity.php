<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleDignity {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createDignity(string $libel_dignite): void {
        $parameter = ['libel_dignite' => $libel_dignite];
        $this->pdo->insert('Dignity', $parameter);
    }

    public function deleteDignity(string $id_dignite): bool {
        $where = "id_dignite = '$id_dignite'";
        return $this->pdo->delete('Dignity', $where);
    }

    public function updateDignity(string $id_dignite, array $data): void {
        $where = "id_dignite = '$id_dignite'";
        $this->pdo->update('Dignity', $data, $where);
    }

    public function getAllDignities(): array {
        return $this->pdo->getAll("Dignity");
    }

    public function getDignityById(string $id_dignite): array {
        return $this->pdo->getAll("Dignity", "id_dignite", $id_dignite);
    }

    public function getLibelDignite(string $id_dignite): string {
        return $this->pdo->getElement("Dignity", "libel_dignite", "id_dignite", $id_dignite);
    }
}

?>

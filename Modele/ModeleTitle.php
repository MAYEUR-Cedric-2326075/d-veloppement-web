<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleTitle {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createTitle(string $libel_titre): void {
        $parameter = ['libel_titre' => $libel_titre];
        $this->pdo->insert('Title', $parameter);
    }

    public function deleteTitle(int $id_titre): bool {
        $where = "id_titre = '$id_titre'";
        return $this->pdo->delete('Title', $where);
    }

    public function updateTitle(int $id_titre, array $data): void {
        $where = "id_titre = '$id_titre'";
        $this->pdo->update('Title', $data, $where);
    }

    public function getAllTitles(): array {
        return $this->pdo->getAll("Title");
    }

    public function getTitleById(int $id_titre): array {
        return $this->pdo->getAll("Title", "id_titre", $id_titre);
    }

    public function getLibelTitre(int $id_titre): string {
        return $this->pdo->getElement("Title", "libel_titre", "id_titre", $id_titre);
    }
}

?>

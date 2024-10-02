<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleRank {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createRank(string $libel_rank): void {
        $parameter = ['libel_rank' => $libel_rank];
        $this->pdo->insert('Rank', $parameter);
    }

    public function deleteRank(int $id_rank): bool {
        $where = "id_rank = '$id_rank'";
        return $this->pdo->delete('Rank', $where);
    }

    public function updateRank(int $id_rank, array $data): void {
        $where = "id_rank = '$id_rank'";
        $this->pdo->update('Rank', $data, $where);
    }

    public function getAllRanks(): array {
        return $this->pdo->getAll("Rank");
    }

    public function getRankById(int $id_rank): array {
        return $this->pdo->getAll("Rank", "id_rank", $id_rank);
    }

    public function getLibelRank(int $id_rank): string {
        return $this->pdo->getElement("Rank", "libel_rank", "id_rank", $id_rank);
    }
}

?>

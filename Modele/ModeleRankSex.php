<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleRankSex {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createRankSex(int $id_rank, string $libel_sex): void {
        $parameter = ['id_rank' => $id_rank, 'libel_sex' => $libel_sex];
        $this->pdo->insert('RankSex', $parameter);
    }

    public function deleteRankSex(int $id_rank, string $libel_sex): bool {
        $where = "id_rank = '$id_rank' AND libel_sex = '$libel_sex'";
        return $this->pdo->delete('RankSex', $where);
    }

    public function updateRankSex(int $id_rank, string $libel_sex, array $data): void {
        $where = "id_rank = '$id_rank' AND libel_sex = '$libel_sex'";
        $this->pdo->update('RankSex', $data, $where);
    }

    public function getAllRankSexes(): array {
        return $this->pdo->getAll("RankSex");
    }

    public function getRankSex(int $id_rank, string $libel_sex): array {
        return $this->pdo->getAll("RankSex", "id_rank", $id_rank, "libel_sex", $libel_sex);
    }
}

?>

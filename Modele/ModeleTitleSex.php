<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleTitleSex {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createTitleSex(int $id_titre, string $libel_sex): void {
        $parameter = ['id_titre' => $id_titre, 'libel_sex' => $libel_sex];
        $this->pdo->insert('TitleSex', $parameter);
    }

    public function deleteTitleSex(int $id_titre, string $libel_sex): bool {
        $where = "id_titre = '$id_titre' AND libel_sex = '$libel_sex'";
        return $this->pdo->delete('TitleSex', $where);
    }

    public function updateTitleSex(int $id_titre, string $libel_sex, array $data): void {
        $where = "id_titre = '$id_titre' AND libel_sex = '$libel_sex'";
        $this->pdo->update('TitleSex', $data, $where);
    }

    public function getAllTitleSexes(): array {
        return $this->pdo->getAll("TitleSex");
    }

    public function getTitleSex(int $id_titre, string $libel_sex): array {
        return $this->pdo->getAll("TitleSex", "id_titre", $id_titre, "libel_sex", $libel_sex);
    }
}

?>

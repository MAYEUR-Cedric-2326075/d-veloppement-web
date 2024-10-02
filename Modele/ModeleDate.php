<?php

require_once './../Noyau/ConnexionBD.php';

class ModeleDate {
    private $pdo;

    public function __construct() {
        $this->pdo = ConnectionBD::getInstance();
    }

    public function createDate(string $date_value): void {
        $parameter = ['date_value' => $date_value];
        $this->pdo->insert('Date', $parameter);
    }

    public function deleteDate(string $id_date): bool {
        $where = "id_date = '$id_date'";
        return $this->pdo->delete('Date', $where);
    }

    public function updateDate(string $id_date, array $data): void {
        $where = "id_date = '$id_date'";
        $this->pdo->update('Date', $data, $where);
    }

    public function getAllDates(): array {
        return $this->pdo->getAll("Date");
    }

    public function getDateById(string $id_date): array {
        return $this->pdo->getAll("Date", "id_date", $id_date);
    }

    public function getDateValue(string $id_date): string {
        return $this->pdo->getElement("Date", "date_value", "id_date", $id_date);
    }
}

?>

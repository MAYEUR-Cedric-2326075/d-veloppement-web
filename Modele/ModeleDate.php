<?php

class ModeleDate {

    public function getDate() {
        $sql = "SELECT * FROM dat";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>

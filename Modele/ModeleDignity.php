<?php

class ModeleDignity {
    public function getDignity() {
        $sql = "SELECT * FROM id_dignity";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}

?>

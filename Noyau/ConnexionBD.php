<?php

final class ConnectionBD
{

    public PDO $pdo;

    private static ?self $instance = null;
    private const db_server_name = 'mysql-ordredestenracs.alwaysdata.net';
    private const db_username = '376578';
    private const db_password = 'Dm6^haY+g2a9bQN';
    private const db_name = 'ordredestenracs_bd';

    private function __construct()
    {
        $this->pdo = new PDO(
            sprintf('mysql:dbname=%s;host=%s', self::db_name, self::db_server_name),
            self::db_username,
            self::db_password
        );
    }

    public static function getInstance(): self
    {
        if (null === self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getPdo()
    {
        return $this->pdo;
    }
    /*
    public function prepare($query):bool
    {
        return $this->pdo->prepare($query);
    }
*/
    public function insert(string $S_table, array $A_parametres): bool
    {
        $attributs = implode(', ', array_keys($A_parametres));
        $valueKeys = implode(', ', array_map(
            fn(string $value) => ':' . $value,
            array_keys($A_parametres)
        ));
        $query = sprintf(' Insert into %s (%s) values  (%s)', $S_table, $attributs, $valueKeys);
        var_dump($query);
        $stmt = $this->pdo->prepare($query);
        foreach ($A_parametres as $attribut => $value) {
            $stmt->bindValue(':' . $attribut, $value);
        }
        $value = $stmt->execute();
        if (false === $value) {
            throw new RuntimeException(
                sprintf(
                    "Cannot insert value for table %s and value %s. SQL error code : %s. SQL error info : %s",
                    $S_table,
                    json_encode($A_parametres),
                    $stmt->errorCode(),
                    json_encode($stmt->errorInfo())
                )
            );
        }
        return $value;
    }

    public function delete(string $S_table, $where)
    {
        $query = "DELETE FROM $S_table WHERE $where";

        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            die('Error : ' . $e->getMessage());
        }
    }

    public function update(string $S_table, $data, $where)
    {
        $query = "UPDATE $S_table SET ";
        $parameters = array();
        foreach ($data as $key => $value) {
            $parameters[] = "$key = :$key";
        }
        $query .= implode(', ', $parameters);
        $query .= " WHERE $where";
        try {
            $stmt = $this->pdo->prepare($query);
            $stmt->execute($data);
            return true;
        } catch (PDOException $e) {
            die('Error : ' . $e->getMessage());
        }
    }
/*
    public function getAll(string $S_table): array
    {
        $query = "SELECT * FROM $S_table";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $result=$stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result)
            return [];
        return $result;
    }
*/
    public function getAll(string $S_table, ?string $fieldIdentification = null, ?string $identification = null): array
    {
        if (is_null($fieldIdentification) || is_null($identification)) {
            $query = "SELECT * FROM $S_table";
        } else {
            $query = "SELECT * FROM $S_table WHERE $fieldIdentification = :identification";
        }

        $stmt = $this->pdo->prepare($query);

        if (!is_null($fieldIdentification) && !is_null($identification)) {
            $stmt->bindValue(':identification', $identification);
        }

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (!$result) {
            return [];
        }

        return $result;
    }


/*
    public function getElement(string $S_table, string $field, ?bool $unique = true,?string $fieldIdentification = null,
                               ?string $identification = null
    ): array|string {
        if (is_null($fieldIdentification) || is_null($identification)) {
            $query = "SELECT $field FROM $S_table";
            if ($unique)
                $query .= " LIMIT 1";

        }
        else{
            $query = "SELECT $field FROM $S_table WHERE $fieldIdentification = :identification";
            if ($unique)
                $query .= " LIMIT 1";

        }

        $stmt = $this->pdo->prepare($query);
        if (!is_null($fieldIdentification) && !is_null($identification))
            $stmt->bindValue(':identification', $identification);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (!$result)
            return [];

        if ($unique && count($result) === 1)
            return $result[0][$field];

        return $result;
    }

*/
public function getElement(string $S_table, string $field, string $fieldIdentification, string $identification): string {
    $query = "SELECT $field FROM $S_table WHERE $fieldIdentification = :identification LIMIT 1";
    $stmt = $this->pdo->prepare($query);
    $stmt->bindValue(':identification', $identification);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (!$result) {
        return '';
    }

    return $result[0][$field] ?? '';
}

?>

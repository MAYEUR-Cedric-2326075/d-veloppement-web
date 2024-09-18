<?php
require_once 'Noyau/ConnectionBD.php';

class ConnexionModele
{
    private $pdo;
    public function __construct() {
        $this->pdo = Connection::getInstance();
    }
}

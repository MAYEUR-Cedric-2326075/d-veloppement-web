<?php

require_once '../Modele/ModeleClub.php';
require_once '../Vues/ViewClub.php';

class ClubController {

    private $modele;
    public function __construct(){
        $this->modele = new ModeleClub();
        
    }

    public function showAll(){
        $view= new ViewClub($this->modele->getAllClub());
        $view->show();
    }
}

$testCC=new ClubController();
$testCC->showAll();
?>

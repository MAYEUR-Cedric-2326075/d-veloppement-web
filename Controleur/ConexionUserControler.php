<?php
require_once '../Modele/ModeleTenrac.php';
require_once '../Vues/ViewConexionUser.php';
class ConexionUserControler
{
    private $modelTenrac;

    public function __construct()
    {
        $this->modelTenrac = new ModeleTenrac();
    }

    public function connectionValidation(): bool
    {
        $view = new ViewConexionUser();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $view->GetEmail();
            $motDePasse = $_POST['mot_de_passe'];


            $pw = $this->modelTenrac->getPassWord($email);
            if (1) {

                if ($motDePasse == $pw) {
                    $view->showSuccess();
                    return true;
                }
            }
        }
        $view->show();
        return  false;
    }

}

$a= new ConexionUserControler();
$b=$a->connectionValidation();
?>
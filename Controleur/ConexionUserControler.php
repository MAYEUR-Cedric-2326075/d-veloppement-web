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
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Vérifie que le formulaire a été soumis
            $email = $view->GetEmail();
            $motDePasse = $_POST['mot_de_passe'];

            // Vérifie si l'utilisateur existe dans la base de données
            $pw = $this->modelTenrac->getPassWord($email);
            if (1) {
                // Utilise password_verify si le mot de passe est haché
                if ($motDePasse == $pw) {
                    $view->showSuccess();
                    return true;
                }
            }
        }
        $view->showFailure(); // Affiche la vue de connexion si la validation échoue ou si le formulaire n'a pas été soumis
        return  false;
    }

}

$a= new ConexionUserControler();
$b=$a->connectionValidation();
?>
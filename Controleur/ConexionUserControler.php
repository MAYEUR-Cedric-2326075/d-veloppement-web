<?php
require_once '../Modele/ModeleTenrac.php';
require_once '../Vues/ConexionUser.php';
class ConexionUserControler
{
    private $modelTenrac;

    public function __construct()
    {
        $this->modelTenrac = new ModeleTenrac();
    }

    public function connectionValidation(): bool
    {
        $view = new ConexionUser();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {  // Vérifie que le formulaire a été soumis
            $email = $view->GetEmail();
            $motDePasse = $view->getMotDePasse();

            // Vérifie si l'utilisateur existe dans la base de données
            $tenrac = $this->modelTenrac->getTenrac($email);
            if (!empty($tenrac)) {
                // Utilise password_verify si le mot de passe est haché
                if (password_verify($motDePasse, $tenrac['mot_de_passe'])) {
                    $view->showSuccess();
                    return true;
                }
            }
        }
        $view->show();  // Affiche la vue de connexion si la validation échoue ou si le formulaire n'a pas été soumis
        return  false;
    }

}

$a= new ConexionUserControler();
$b=$a->connectionValidation();
?>
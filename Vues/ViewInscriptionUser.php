<?php
include 'fonctions.php';

class ViewInscriptionUser {
    private string $email;
    private string $nom;
    private string $prenom;
    private string $sexe;
    private string $motDePasse;
    public function __construct() {
        $this->email = isset($_POST['email']) ? $_POST['email'] : '';
        $this->nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $this->prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $this->sexe = isset($_POST['sexe']) ? $_POST['sexe'] : '';
        $this->motDePasse = isset($_POST['motDePasse']) ? $_POST['motDePasse'] : '';

    }
    public function getEmail(): string {
        return $this->email;
    }
    public function getNom(): string {
        return $this->nom;
    }
    public function getPrenom(): string {
        return $this->prenom;
    }
    public function getSexe(): string {
        return $this->sexe;
    }
    public function getMotDePasse(): string {
        return $this->motDePasse;
    }

    public function show(): void {
        ob_start();
        haut_page();
        header_page();
        ?>
        <main>
            <form class="corps" action="/intranet.html" method="post" enctype="text/plain">
                <h1>Inscription</h1>
                <label for="email">Email : </label>
                <input id="email" type="email" name="email" value="" required="required"><br>
                <label for="nom">Nom : </label>
                <input id="nom" type="text" name="nom" value="" required="required"><br>
                <label for="prenom">Prenom : </label>
                <input id="prenom" type="text" name="prenom" value="" required="required"><br>
                <input type="radio" name="sexe" value="Homme" id="sexe" /><label for="sexe" >Homme</label>
                <input type="radio" name="sexe" value="Femme" id="sexe" /><label for="sexe">Femme</label>
                <label for="mot_de_passe">Mot de passe : </label>
                <input id="mot_de_passe" type="password" name="mot_de_passe" value="" required="required""><br>

                <!-- <input id="send" class="envoi" type="submit" value="Envoyer"> -->
                <a class="button" id="send" href="/intranet.html">Envoyer</a>
            </form>
        </main>
        <?php
        bas_page();
    }
}
?>
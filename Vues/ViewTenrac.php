<?php
include 'fonctions.php';

class ViewTenrac {

    private $tab;

    public function __construct($tab) {
        $this->tab = $tab;
    }

    public function show(): void {
        ob_start();
        haut_page();
        header_page();
        ?>
        <main>
        <table>
            <tr>
                <td>mail</td>
                <td>Nom</td>
                <td>Surnom</td>
                <td>id_dignite</td>
                <td>id_grade</td>
                <td>libel_sex</td>
                <td>id_titre</td>
                <td>id_rang</td>
                <td>id_club</td>
            </tr>
            <?php
            foreach ($this->tab as $tenrac) {
                ?><tr><td><?php
                echo $tenrac["mail_tenrac"];
                ?></td><td><?php
                echo $tenrac["Name"]
                ?></td><td><?php
                echo $tenrac["Surname"];
                ?></td><td><?php
                echo $tenrac["id_dignite"];
                ?></td><td><?php
                echo $tenrac["id_grade"];
                ?></td><td><?php
                echo $tenrac["libel_sex"];
                ?></td><td><?php
                echo $tenrac["id_titre"];
                ?></td><td><?php
                echo $tenrac["id_rang"];
                ?></td><td><?php
                echo $tenrac["id_club"];
                ?></td></tr><?php
            }
            ?>
        </table>
        </main><?php
    }
}
?>

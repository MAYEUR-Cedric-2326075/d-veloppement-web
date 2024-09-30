<?php
include 'fonctions.php';

class ViewSauce {

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
                <td>id</td>
                <td>Sauce</td>
            </tr>
            <?php
            foreach ($this->tab as $sauce) {
                ?><tr><td><?php
                    echo $sauce["Id"]
                    ?></td><td><?php
                    echo $sauce["Sauce"];
                    ?></td></tr><?php
            }
            ?>
        </table>
        </main><?php
    }
}
?>

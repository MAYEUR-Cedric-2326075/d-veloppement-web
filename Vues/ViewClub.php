<?php
include 'fonctions.php';

class ViewClub {

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
                    <td>code postal</td>
                    <td>label</td>
                </tr>
                <?php
                foreach ($this->tab as $club) {
                    ?><tr><td><?php
                    echo $club["Id"]
                    ?></td><td><?php
                    echo $club["CP"]
                    ?></td><td><?php
                    echo $club["Label"];
                    ?></td></tr><?php
                }
                ?>
            </table>
        </main><?php
    }
}
?>

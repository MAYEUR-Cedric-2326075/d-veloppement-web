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
                <td>is_vegetable</td>
                <td>ingredient</td>
            </tr>
            <?php
            foreach ($this->tab as $ingredient) {
                ?><tr><td><?php
                    echo $ingredient["Id"]
                    ?></td><td><?php
                    if ($ingredient["is_vegetable"]) {
                        echo "Danger !";
                    }else{
                        echo "sans danger";
                    }
                    ?></td><td><?php
                    echo $ingredient["Ingredient"];
                    ?></td></tr><?php
            }
            ?>
        </table>
        </main><?php
    }
}
?>

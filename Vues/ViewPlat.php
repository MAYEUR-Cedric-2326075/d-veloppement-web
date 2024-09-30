<?php
include 'fonctions.php';

haut_page();
header_page();
class ViewPlat
{
    private $plats;
    public function __construct($plats) {
        $this->plats = $plats;
    }
    public function show(){?>
        <table>
            <?php
            foreach ($this->plats as $plat) { ?>
                <tr>
                    <td>
                        <?php echo $plat["Id_plat"];?>
                    </td>
                    <td>
                        <?php echo $plat["Libel_plat"];?>
                    </td>
                </tr>
                <?php
            } ?>
        </table>
        <?php
    }
}
bas_page();
?>
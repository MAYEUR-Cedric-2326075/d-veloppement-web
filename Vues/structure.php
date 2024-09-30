//a déplacer dans css
<style>table
    {
        margin: auto;
        font-size: 2em;
        -webkit-border-horizontal-spacing: 1em;
    }
    tr
    {
        text-align :center;
    }</style>
<?php
include 'fonctions.php';
haut_page();
header_page();

//a décomenter
//$tab = $_POST['tableClub'];

//exemple a effacer
$tab = array(
    array("Id" => 1, "CP" => 13100, "Label" => "Aix-en-Provence"),
    array("Id" => 2, "CP" => 13140, "Label" => "Miramas"),
    array("Id" => 3, "CP" => 12300, "Label" => "Bouillac"),
);
?>

<main>
    <table>
        <tr>
            <td>id</td>
            <td>code postal</td>
            <td>label</td>
        </tr>
        <?php
        foreach ($tab as $club) {
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
</main>

<?php
bas_page();
?>


ViewClub
methode show
regarder exemple constructeur view
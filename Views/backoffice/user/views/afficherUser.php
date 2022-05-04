<?PHP
include "../core/UserC.php";
$User1C=new UserC();
$listeEmployes=$User1C->afficherUser();

//var_dump($listeUser->fetchAll());
?>
<table border="1">
    <tr>
        <td>id</td>
        <td>Nom</td>
        <td>mail</td>
        <td>pass</td>
        <td>type</td>
        <td>supprimer</td>
        <td>modifier</td>
    </tr>

    <?PHP
    foreach($listeUser as $row){
        ?>
        <tr>
            <td><?PHP echo $row['id']; ?></td>
            <td><?PHP echo $row['nom']; ?></td>
            <td><?PHP echo $row['mail']; ?></td>
            <td><?PHP echo $row['pass']; ?></td>
            <td><?PHP echo $row['type']; ?></td>
            <td><form method="POST" action="supprimerUser.php">
                    <input type="submit" name="supprimer" value="supprimer">
                    <input type="hidden" value="<?PHP echo $row['id']; ?>" name="id">
                </form>
            </td>
            <td><a href="modifierUser.php?id=<?PHP echo $row['id']; ?>">
                    Modifier</a></td>
        </tr>
        <?PHP
    }
    ?>
</table>



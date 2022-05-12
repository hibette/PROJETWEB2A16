<?PHP
include "../entities/commande.php";
include "../core/commandeC.php";
include "../../panier/entities/panier.php";
include "../../panier/core/panierC.php";





$commande1C=new commandeC();
$liste=$commande1C->sommecommande();
foreach($liste as $row){
	$somme=$row['som'];
}


if(isset($_GET['date']))
{

$commande1=new commande($_GET['date'],$somme);


$commande1C->ajoutercommande($commande1);

$liste1=$commande1C->dernierid();

foreach($liste1 as $row){
	$id=$row['maxi'];
}

$panierC=new panierC();
$panierC->updatepanier($id);











header('Location: http://localhost/haroun/php/produit/views/index.php');

}
else
{
?>

<style>
label {
    display: block;
    font: 1rem 'Fira Sans', sans-serif;
}

input,
label {
    margin: .4rem 0;
}
</style>
<label for="start">date livraison:</label>

<?PHP

?>

<form name="form1" action="http://localhost/haroun/php/commande/views/ajoutercommande.php" method="get">
<input type="date" id="start" name="date"
       value="2021-1-1"
       min="2021-01-01" max="2050-12-31">
	   <input class="button"  id="button" type="submit" value="Apply"  />
</form>
<?PHP

}










	

//*/

?>
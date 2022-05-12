
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<?PHP

include __DIR__."/../core/panierC.php";
$panier1C=new panierC();
$listepaniers=$panier1C->afficherpaniers();

?>
<table>
<tr>
	<td>nom</td>
	<td>prix</td>
	<td>suprimer</td>
    </tr>
<?PHP
foreach($listepaniers as $row){
	if($row['id_commande']==NULL)
	{
	?>
	<tr>
	<td><span><?=$row['nom']?></span></td>

	<td><span>$<?=$row['prix']?>TND</span></td>
	<td scope="row" class="text-center">
		<a href="http://localhost/haroun/php/panier/views/supprimerpanier.php?id=<?=$row['idp']?>" class="fa fa-trash"></a>
		
	</td>
</tr>
	
<?php	
}
}
?>

</table>
<a href="http://localhost/haroun/php/commande/views/ajoutercommande.php?">passer commande</a>
<?php
	include '../Controller/ProduitC.php';
	$ProduitC=new ProduitC();
	$listeProduits=$ProduitC->afficherProduits(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterProduit.php">Ajouter Produit</a></button>
		<center><h1>Liste des Produits</h1></center>
		

		<table border="1" align="center">
			<tr>
				<th>Nom</th>
				<th>Prix</th>
				<th>Taille</th>
				<th>Genre</th>
				<th>Image</th>
				<th>Modifier</th>
				<th>Supprimer</th>
			</tr>
			<?php
				foreach($listeProduits as $Produit){
			?>
			<tr>
				<td><?php echo $Produit['nom']; ?></td>
				<td><?php echo $Produit['Prix']; ?></td>
				<td><?php echo $Produit['Taille']; ?></td>
				<td><?php echo $Produit['Genre']; ?></td>
				<td><?php echo $Produit['image']; ?></td>
				<td>
					<form method="POST" action="modifierProduit.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $Produit['RefProduit']; ?> name="RefProduit">
					</form>
				</td>
				<td>
					<a href="supprimerProduit.php?RefProduit=<?php echo $Produit['RefProduit']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>

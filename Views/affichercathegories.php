<?php
	include '../Controller/CathegoriesC.php';
	$CathegorieC=new cathegoriesC();
	$listeCathegories=$CathegorieC->affichercathegoriess(); 
?>
<html>
	<head></head>
	<body>
	    <button><a href="ajouterCathegorie.php">Ajouter Cathegorie</a></button>
		<center><h1>Liste des Cathegories</h1></center>
		

		<table border="1" align="center">
			<tr>
				<th>IDcathegories</th>
				<th>nomcathegories</th>
				
			</tr>
			<?php
				foreach($listeCathegories as $Cathegorie){
			?>
			<tr>
				<td><?php echo $Cathegorie['IDcathegories']; ?></td>
				<td><?php echo $Cathegorie['nomcathegories']; ?></td>
				
				
		
				<td>
					<form method="POST" action="modifierCathegorie.php">
						<input type="submit" name="Modifier" value="Modifier">
						<input type="hidden" value=<?PHP echo $Cathegorie['IDcathegories']; ?> name="RefCathegorie">
					</form>
				</td>
				<td>
					<a href="supprimerCathegorie.php?RefCathegorie=<?php echo $Cathegorie['IDcathegories']; ?>">Supprimer</a>
				</td>
			</tr>
			<?php
				}
			?>
		</table>
	</body>
</html>

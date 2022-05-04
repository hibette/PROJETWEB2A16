<?php
	include '../Controller/ProduitC.php';
	$ProduitC=new ProduitC();
	$ProduitC->supprimerProduit($_GET["RefProduit"]);
	header('Location:afficherListeProduits.php');
?>
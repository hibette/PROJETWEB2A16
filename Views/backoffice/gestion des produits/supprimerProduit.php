<?php
 include_once 'C:/xampp/htdocs/hiba/Controller/ProduitC.php';
	$ProduitC=new ProduitC();
	$ProduitC->supprimerProduit($_GET["RefProduit"]);
	header('Location:list.php');
?>
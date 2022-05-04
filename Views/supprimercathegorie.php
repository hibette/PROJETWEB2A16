<?php
	include '../Controller/cathegoriesC.php';
	$cathegoriesC=new cathegoriesC();
	$cathegoriesC->supprimercathegories($_GET["RefCathegorie"]);
	header('Location:affichercathegories.php');
?>
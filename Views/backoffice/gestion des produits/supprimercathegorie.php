<?php
    include_once 'C:/xampp/htdocs/hiba/Controller/CathegoriesC.php';
	$cathegoriesC=new cathegoriesC();
	$cathegoriesC->supprimercathegories($_GET["RefCathegorie"]);
	header('Location:listc.php');
?>
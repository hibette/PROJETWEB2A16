<?PHP

include "../core/panierC.php";
$panierC=new panierC();

if (isset($_GET["id"])){
	
	$panierC->supprimerpanier($_GET["id"]);
	
	header('Location: http://localhost/haroun/php/produit/views/index.php');
}

?>


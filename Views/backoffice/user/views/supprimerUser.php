<?PHP
include "../core/userC.php";
$userC=new EmployeC();
if (isset($_POST["id"])){
	$userC->supprimerUser($_POST["id"]);
	header('Location: afficherUser.php');
}

?>
<?PHP
include "../entities/user.php";
include "../core/userC.php";

if (isset($_POST['id']) and isset($_POST['nom']) and isset($_POST['mail']) and isset($_POST['pass']) and isset($_POST['type'])){
$User1=new user($_POST['id'],$_POST['nom'],$_POST['mail'],$_POST['pass'],$_POST['type']);
//Partie2
/*
var_dump($User1);
}
*/
//Partie3
$User1C=new UserC();
$User1C->ajouterUser($User1);
header('Location: afficherUser.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>
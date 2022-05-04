<?PHP
include "../config.php";
class EmployeC {
function afficheruser ($user){
		echo "id: ".$user->getid()."<br>";
		echo "Nom: ".$user->getNom()."<br>";
		echo "mail: ".$user->getmail()."<br>";
		echo "pass: ".$user->getpass()."<br>";
		echo "type: ".$user->gettype()."<br>";
	}

	function ajouterEmploye($user){
		$sql="insert into user (id,nom,mail,pass,type) values 
(:id, :nom,:mail,:pass,:type)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id=$user->getCin();
        $nom=$user->getNom();
        $mail=$user->getmail();
        $pass=$user->getpass();
        $type=$user->gettype();
        //lier variable => paramètre
        $req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':pass',$pass);
		$req->bindValue(':type',$type);
            $req->execute();
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	function afficherUser(){
		$sql="SElECT * From user";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerUser($id){
		$sql="DELETE FROM user where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierUser($user,$id){
		$sql="UPDATE user SET id=:id, nom=:nom,mail=:mail,pass=:pass,type=:type WHERE id=:id";
		$db = config::getConnexion();
try{

        $req=$db->prepare($sql);
		$id=$user->getId();
        $nom=$user->getNom();
        $mail=$user->getMail();
        $pass=$user->getpass();
        $type=$user->gettype();
		$datas = array(':idd'=>$idd, ':id'=>$id, ':nom'=>$nom,':mail'=>$mail,':pass'=>$pass,':type'=>$type);
		//lier variable => paramètre
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);
		$req->bindValue(':nom',$nom);
		$req->bindValue(':mail',$mail);
		$req->bindValue(':pass',$pass);
		$req->bindValue(':type',$type);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	?>
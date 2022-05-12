<?PHP

include_once __DIR__."/../../config.php";

class panierC {
	



	function ajouterpanier($panier){
		$sql="insert into panier (id_produit,id_commande)
 values (:id, :id_produit)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $id_produit=$panier->getid_produit();
        $id_commande=$panier->getid_commande();
      
		$req->bindValue(':id',$id_produit);
		$req->bindValue(':id_produit',$id_commande);
		
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherpaniers(){
		
		$sql="SELECT b.id_commande, b.id as idp, b.id_produit, a.id as idpr, a.nom, a.prix , a.taille ,a.image from panier b inner join produit a on b.id_produit = a.id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
		}	
		
	}

	function supprimerpanier($id){
		$sql="DELETE FROM panier where id = :id ";
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

	function updatepanier($id){
		$sql="UPDATE panier SET id_commande=:id WHERE id_commande is NULL";
		$db = config::getConnexion();
		
		$req=$db->prepare($sql);
		
		$req->bindValue(':id',$id);
/* 		if(!is_array($date))
		echo't';  */
		
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}

	function afficherpanier($id){
		
		$sql="SELECT b.id_produit , a.id , a.nom as nom ,a.prix as prix from panier b inner join produit a on b.id_produit=a.id where id_commande =".$id;
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
		}	
		
	}

	function countpanier($id){
		
		$sql="SELECT count(id) as nbr from panier where id_commande =".$id;
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
		}	
		
	}
	
	
}

?>

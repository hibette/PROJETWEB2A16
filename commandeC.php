<?PHP

include_once __DIR__."/../../config.php";

class commandeC {
	



	function ajoutercommande($commande){
		
		$sql="insert into commande (date,prix) values (:date, :prix)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
        $date=$commande->getdate();
        $prix=$commande->getprix();

		
      
		$req->bindValue(':date',$date);
		$req->bindValue(':prix',$prix);
		
		
            $req->execute();
			

			
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function affichercommandes(){
		
		$sql="SELECT * from commande";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
		}	
		
	}

	function dernierid(){
		
		$sql="SELECT max(id) as maxi from commande ";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
		}	
		
	}
	
	
	function sommecommande(){
		$sql="SELECT SUM(b.prix) as som from produit b INNER JOIN panier a on b.id = a.id_produit where a.id_commande is NULL";
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

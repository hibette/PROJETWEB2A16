<?PHP
class panier{
	private $id_produit;
	private $id_commande;
	

	
	function __construct($id_produit,$id_commande){
		$this->id_produit=$id_produit;
		$this->id_commande=$id_commande;
		
	}
	function getid_produit(){
		return $this->id_produit;
	}
	function getid_commande(){
		return $this->id_commande;
	}
	

	function setid_commande($id_commande){
		$this->id_commande=$id_commande;
	}

	
}

?>